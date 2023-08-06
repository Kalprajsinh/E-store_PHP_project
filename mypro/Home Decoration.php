<?php
require('cartdatabase.php');
require('connectsms.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];
  $name = $_POST['name'];
  $image = $_POST['image'];
  $price = $_POST['price'];
  $mrp = $_POST['mrp'];
  $discount = $_POST['discount'];
  $about = $_POST['about'];
  $priceint = $_POST['priceint'];
  $_SESSION['priceint'] = $_POST['priceint'];

  $sql = "INSERT INTO `cartinfo` (`email`, `name`, `image`, `price`, `mrp`, `discount`, `about` , `priceint`) 
          VALUES ('$email', '$name', '$image', '$price', '$mrp', '$discount', '$about','$priceint')";
  $run = mysqli_query($connectcart, $sql);

  if ($run) {
    echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> item added in cart!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  } else {
    echo "Error: " . mysqli_error($connectcart);
  }
}
$sqli = "SELECT * FROM `cartinfo` ORDER BY id DESC LIMIT 1";
$runi = mysqli_query($connectcart, $sqli);

    if ($runi) 
    {
        $run_fetchi = mysqli_fetch_assoc($runi);
        $emaillast = $run_fetchi['email'];
        $idlast = $run_fetchi['id'];
    }
$p12 = 5999;
$p13 = 345;
$p14 = 2999;
$p15 = 5299;
$p16 = 1550;
$sms = "SELECT `name`, `pname`, `code`, `cprice` , `Mobile`,`id` FROM `sms`";
$runsms = mysqli_query($connectsms, $sms);

$stoploop = true;

while (($smsdata = mysqli_fetch_array($runsms)) && $stoploop == true) {
  if($smsdata['code'] == "p12")
  {
     if($p12 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p12'>
        <input type='hidden' name='smsMobile' value='$smsdata[Mobile]'>
        <input type='submit' value='Submit'>
      </form>";
      $sqlq = "DELETE FROM `sms` WHERE id = '$smsdata[id]'";
      $runq = mysqli_query($connectsms, $sqlq);
      echo "<script type='text/javascript'>
          document.myform.submit();
      </script>
      ";
      $stoploop = false;
     }
  }
  if($smsdata['code'] == "p13")
  {
    if($p13 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p13'>
        <input type='hidden' name='smsMobile' value='$smsdata[Mobile]'>
        <input type='submit' value='Submit'>
      </form>";
      $sqlq = "DELETE FROM `sms` WHERE id = '$smsdata[id]'";
      $runq = mysqli_query($connectsms, $sqlq);
      echo "<script type='text/javascript'>
          document.myform.submit();
      </script>
      ";
      $stoploop = false;
     }
  }
  if($smsdata['code'] == "p14")
  {
    if($p14 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p14'>
        <input type='hidden' name='smsMobile' value='$smsdata[Mobile]'>
        <input type='submit' value='Submit'>
      </form>";
      $sqlq = "DELETE FROM `sms` WHERE id = '$smsdata[id]'";
      $runq = mysqli_query($connectsms, $sqlq);
      echo "<script type='text/javascript'>
          document.myform.submit();
      </script>
      ";
      $stoploop = false;
     }
  }
  if($smsdata['code'] == "p15")
  {
    if($p15 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p15'>
        <input type='hidden' name='smsMobile' value='$smsdata[Mobile]'>
        <input type='submit' value='Submit'>
      </form>";
      $sqlq = "DELETE FROM `sms` WHERE id = '$smsdata[id]'";
      $runq = mysqli_query($connectsms, $sqlq);
      echo "<script type='text/javascript'>
          document.myform.submit();
      </script>
      ";
      $stoploop = false;
     }
  }
  if($smsdata['code'] == "p16")
  {
    if($p16 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p16'>
        <input type='hidden' name='smsMobile' value='$smsdata[Mobile]'>
        <input type='submit' value='Submit'>
      </form>";
      $sqlq = "DELETE FROM `sms` WHERE id = '$smsdata[id]'";
      $runq = mysqli_query($connectsms, $sqlq);
      echo "<script type='text/javascript'>
          document.myform.submit();
      </script>
      ";
      $stoploop = false;
     }
  }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home Decoration items</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Home.php">E-Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
      

      if(isset($_SESSION['logindone']))
      {
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
       </li>
       ";
      }
      else{
      echo '<li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
           </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>';
      }
      ?>
    </ul>
    <span class="navbar-text">
     <a href="cart.php">my cart
     <img src="https://image.shutterstock.com/image-vector/shopping-cart-icon-vector-260nw-762885163.jpg"  width='30' height='30' style="margin-right: 15px;"></a>
    <?php
      if(isset($_SESSION['logindone']))
      {
        echo "
          $_SESSION[name]
          <img src='https://img.icons8.com/?size=512&id=41799&format=png' width='30' height='30''>
       ";
      }
      ?>
    </span>
  </div>
</nav>

    <!-- prodects -->
    <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 5px;" src="https://m.media-amazon.com/images/I/71T+IrwoeLL._SY450_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Large Peacock Wall Clock</b></p>
      
              <p class="card-text">Silent Crystal Creative Personality Modern Art Decorative Wall Clocks | Multicolor</p>
              <p class="card-text"><b>Price :</b>₹5,999 (-45%)</p>
              <p class="card-text"><b>MRP :</b><del>₹10,999</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                  <input type="hidden" name="email" value="<?php 
                  if(isset($_SESSION['logindone']))
                  {
                   echo $_SESSION['email']; 
                  }
                  else
                  {
                    
                  if (strpos($emaillast, '@') !== false) {
                      $_SESSION['emaillast'] = "";
                      echo $idlast;
                  } else {
                      $_SESSION['emaillast'] = $emaillast;
                      echo $emaillast;
                  }
                  }
                   ?>">
                  <input type="hidden" name="name" value="Large Peacock Wall Clock">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/71T+IrwoeLL._SY450_.jpg">
                  <input type="hidden" name="price" value="₹5,999">
                  <input type="hidden" name="mrp" value="₹10,999">
                  <input type="hidden" name="discount" value="(-45%)">
                  <input type="hidden" name="about" value="Silent Crystal Creative Personality Modern Art Decorative Wall Clocks | Multicolor">
                  <input type="hidden" name="priceint" value=5999.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Large Peacock Wall Clock">
                      <input type="hidden" name="code" value="p12">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://m.media-amazon.com/images/I/91+m3QpfW2L._SY450_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Ganesha with Peacocks Art Painting</b></p>
              <p class="card-text">Indianara Set of 3 Ganesha (3865BK) without glass 6 X 13, 10.2 X 13, 6 X 13 INCH</p>
              <p class="card-text"><b>Price :</b> ₹345 (-71%)</p>
              <p class="card-text"><b>MRP :</b><del>₹1,200</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form action="" method="post">
                  <input type="hidden" name="email" value="<?php 
                  if(isset($_SESSION['logindone']))
                  {
                   echo $_SESSION['email']; 
                  }
                  else
                  {
                    
                    if (strpos($emaillast, '@') !== false) {
                      echo $idlast;
                  } else {
                      echo $emaillast;
                  }
                  }
                   ?>">
                  <input type="hidden" name="name" value="Ganesha with Peacocks Art Painting">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/91+m3QpfW2L._SY450_.jpg">
                  <input type="hidden" name="price" value="₹345">
                  <input type="hidden" name="mrp" value="₹1,200">
                  <input type="hidden" name="discount" value="(-71%)">
                  <input type="hidden" name="about" value="Indianara Set of 3 Ganesha (3865BK) without glass 6 X 13, 10.2 X 13, 6 X 13 INCH">
                  <input type="hidden" name="priceint" value=345.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Ganesha with Peacocks Art Painting">
                      <input type="hidden" name="code" value="p13">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 27px;" src="https://m.media-amazon.com/images/I/615RWhKvfOL._SY450_.jpg" width="175" height="" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>3D Galaxy Crystal Ball Night Light</b></p>
              <p class="card-text">Night Light 80cm(3.15inch) Ball Projection Lamp Gift for Teens Boys and Girls (Deer)</p>
              <p class="card-text"><b>Price :</b> ₹2,999 (-50%)</p>
              <p class="card-text"><b>MRP :</b><del>₹5,999</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                  <input type="hidden" name="email" value="<?php 
                  if(isset($_SESSION['logindone']))
                  {
                   echo $_SESSION['email']; 
                  }
                  else
                  {
                    
                  if (strpos($emaillast, '@') !== false) {
                      $_SESSION['emaillast'] = "";
                      echo $idlast;
                  } else {
                      $_SESSION['emaillast'] = $emaillast;
                      echo $emaillast;
                  }
                  }
                   ?>">
                  <input type="hidden" name="name" value="3D Galaxy Crystal Ball Night Light">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/615RWhKvfOL._SY450_.jpg">
                  <input type="hidden" name="price" value="₹2,999">
                  <input type="hidden" name="mrp" value="₹5,999">
                  <input type="hidden" name="discount" value="(-50%)">
                  <input type="hidden" name="about" value="Night Light 80cm(3.15inch) Ball Projection Lamp Gift for Teens Boys and Girls (Deer)">
                  <input type="hidden" name="priceint" value=2999.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="3D Galaxy Crystal Ball Night Light">
                      <input type="hidden" name="code" value="p14">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 25px;" src="https://m.media-amazon.com/images/I/719kcUydqGL._SX679_.jpg" width="175" height="175" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>7 Running Horses</b></p>
              <p class="card-text">Rajasthani Antique Metal | Horses with LED Wall Décor (56 x 02 x 33 In) | Colour	Multi
                    | Style	Art Deco</p>
              <p class="card-text"><b>Price :</b> ₹5,299 (-41%)</p>
              <p class="card-text"><b>MRP :</b><del>₹8,999</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                  <input type="hidden" name="email" value="<?php 
                  if(isset($_SESSION['logindone']))
                  {
                   echo $_SESSION['email']; 
                  }
                  else
                  {
                    
                  if (strpos($emaillast, '@') !== false) {
                      $_SESSION['emaillast'] = "";
                      echo $idlast;
                  } else {
                      $_SESSION['emaillast'] = $emaillast;
                      echo $emaillast;
                  }
                  }
                   ?>">
                  <input type="hidden" name="name" value="7 Running Horses">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/719kcUydqGL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹5,299">
                  <input type="hidden" name="mrp" value="₹8,999">
                  <input type="hidden" name="discount" value="(-41%)">
                  <input type="hidden" name="about" value="Rajasthani Antique Metal | Horses with LED Wall Décor (56 x 02 x 33 In) | Colour	Multi
                    | Style	Art Deco">
                  <input type="hidden" name="priceint" value=5299.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="7 Running Horses">
                      <input type="hidden" name="code" value="p15">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 25px;" src="https://m.media-amazon.com/images/I/51Enb4nvQPL._SX450_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>swanart 10W Chandelier Light</b></p>
              <p class="card-text">(6529, Multicolor)(Acrylic)</p>
              <p class="card-text"><b>Price :</b> ₹1,550 (-38%)</p>
              <p class="card-text"><b>MRP :</b><del>₹2,499</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form action="" method="post">
                  <input type="hidden" name="email" value="<?php 
                  if(isset($_SESSION['logindone']))
                  {
                   echo $_SESSION['email']; 
                  }
                  else
                  {
                    
                    if (strpos($emaillast, '@') !== false) {
                      echo $idlast;
                  } else {
                      echo $emaillast;
                  }
                  }
                   ?>">
                  <input type="hidden" name="name" value="swanart 10W Chandelier Light">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/51Enb4nvQPL._SX450_.jpg">
                  <input type="hidden" name="price" value="₹1,550">
                  <input type="hidden" name="mrp" value="₹2,499">
                  <input type="hidden" name="discount" value="(-38%)">
                  <input type="hidden" name="about" value="(6529, Multicolor)(Acrylic)">
                  <input type="hidden" name="priceint" value=1550.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="swanart 10W Chandelier Light">
                      <input type="hidden" name="code" value="p16">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
