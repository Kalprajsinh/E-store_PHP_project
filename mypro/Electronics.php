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
$p7 = 58999;
$p8 = 34300;
$p9 = 21999;
$p10 = 109990;
$p11 = 323990;
$sms = "SELECT `name`, `pname`, `code`, `cprice` , `Mobile`,`id` FROM `sms`";
$runsms = mysqli_query($connectsms, $sms);

$stoploop = true;

while (($smsdata = mysqli_fetch_array($runsms)) && $stoploop == true) {
  if($smsdata['code'] == "p7")
  {
     if($p7 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p7'>
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
  if($smsdata['code'] == "p8")
  {
    if($p8 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p8'>
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
  if($smsdata['code'] == "p9")
  {
    if($p9 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p9'>
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
  if($smsdata['code'] == "p10")
  {
    if($p10 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p10'>
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
  if($smsdata['code'] == "p11")
  {
    if($p11 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p11'>
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

    <title>Electronics items</title>
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
            <img src="https://m.media-amazon.com/images/I/41J1kYfM6PL._SX300_SY300_QL70_FMwebp_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Digital camera Canon EOS 200D</b></p>
      
              <p class="card-text">24.1MP Digital SLR Camera + EF-S 18-55mm f4 is STM Lens (Black)</p>
              <p class="card-text"><b>Price :</b> ₹58,999 (-5%)</p>
              <p class="card-text"><b>MRP :</b><del>₹61,995</del></p>
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
                  <input type="hidden" name="name" value="Digital camera Canon EOS 200D">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/41J1kYfM6PL._SX300_SY300_QL70_FMwebp_.jpg">
                  <input type="hidden" name="price" value="₹58,999">
                  <input type="hidden" name="mrp" value="₹61,995">
                  <input type="hidden" name="discount" value="(-5%)">
                  <input type="hidden" name="about" value="24.1MP Digital SLR Camera + EF-S 18-55mm f4 is STM Lens (Black)">
                  <input type="hidden" name="priceint" value=58999.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Digital camera Canon EOS 200D">
                      <input type="hidden" name="code" value="p7">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://m.media-amazon.com/images/I/51IpFZCaVsL._SX679_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>CHIST Gaming PC Core i7 </b></p>
              <p class="card-text">3770 processor/16 GB RAM/1 TB SSD/Windows 10/GT 730 4GB ddr5 Graphic</p>
              <p class="card-text"><b>Price :</b> ₹34,300 (-29%)</p>
              <p class="card-text"><b>MRP :</b><del>₹48,000</del></p>
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
                  <input type="hidden" name="name" value="CHIST Gaming PC Core i7">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/51IpFZCaVsL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹34,300">
                  <input type="hidden" name="mrp" value="₹48,000">
                  <input type="hidden" name="discount" value="(-29%)">
                  <input type="hidden" name="about" value="3770 processor/16 GB RAM/1 TB SSD/Windows 10/GT 730 4GB ddr5 Graphic">
                  <input type="hidden" name="priceint" value=34300.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="CHIST Gaming PC Core i7">
                      <input type="hidden" name="code" value="p8">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 45px;" src="https://m.media-amazon.com/images/I/71g3OF4CL9L._AC_UY327_FMwebp_QL65_.jpg" width="175" height="130" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Redmi 11 Smart TV</b></p>
              <p class="card-text">108 cm (43 inches) Android 11 Series Full HD Smart LED TV L43M6-RA/L43M7-RA (Black)</p>
              <p class="card-text"><b>Price :</b> ₹21,999 (-37%)</p>
              <p class="card-text"><b>MRP :</b><del>₹34,999</del></p>
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
                  <input type="hidden" name="name" value="Redmi 11 Smart TV">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/71g3OF4CL9L._AC_UY327_FMwebp_QL65_.jpg">
                  <input type="hidden" name="price" value="₹21,999">
                  <input type="hidden" name="mrp" value="₹34,999">
                  <input type="hidden" name="discount" value="(-37%)">
                  <input type="hidden" name="about" value="108 cm (43 inches) Android 11 Series Full HD Smart LED TV L43M6-RA/L43M7-RA (Black)">
                  <input type="hidden" name="priceint" value=21999.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Redmi 11 Smart TV">
                      <input type="hidden" name="code" value="p9">
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
            <img src="https://m.media-amazon.com/images/I/81kUtzkPqOS._SX679_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Fujitsu UH-X 12th Gen Intel Evo</b></p>
              <p class="card-text">Core i7 13.3 inch(33cm) /1TB SSD/MS Office 21 / Iris Xe Graphics</p>
              <p class="card-text"><b>Price :</b> ₹1,09,990 (-25%)</p>
              <p class="card-text"><b>MRP :</b><del>₹1,46,890</del></p>
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
                  <input type="hidden" name="name" value="Fujitsu UH-X 12th Gen Intel Evo">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/81kUtzkPqOS._SX679_.jpg">
                  <input type="hidden" name="price" value="₹1,09,990">
                  <input type="hidden" name="mrp" value="₹1,46,890">
                  <input type="hidden" name="discount" value="(-25%)">
                  <input type="hidden" name="about" value="Core i7 13.3 inch(33cm) /1TB SSD/MS Office 21 / Iris Xe Graphics">
                  <input type="hidden" name="priceint" value=109990.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Fujitsu UH-X 12th Gen Intel Evo">
                      <input type="hidden" name="code" value="p10">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://m.media-amazon.com/images/I/61Ph34V0YAL._SX679_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Apple MacBook Pro Laptop</b></p>
              <p class="card-text">33.74 cm (16.2-inch), 32GB Unified Memory, 1TB SSD Storage.</p>
              <p class="card-text"><b>Price :</b> ₹3,23,990 (-7%)</p>
              <p class="card-text"><b>MRP :</b><del>₹3,49,900</del></p>
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
                  <input type="hidden" name="name" value="Apple MacBook Pro Laptop">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/61Ph34V0YAL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹3,23,990">
                  <input type="hidden" name="mrp" value="₹3,49,900">
                  <input type="hidden" name="discount" value="(-7%)">
                  <input type="hidden" name="about" value="33.74 cm (16.2-inch), 32GB Unified Memory, 1TB SSD Storage.">
                  <input type="hidden" name="priceint" value=323990.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Apple MacBook Pro Laptop">
                      <input type="hidden" name="code" value="p11">
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
