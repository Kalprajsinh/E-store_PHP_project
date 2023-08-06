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
$p17 = 9699;
$p18 = 164999;
$p19 = 46280;

$sms = "SELECT `name`, `pname`, `code`, `cprice` , `Mobile`,`id` FROM `sms`";
$runsms = mysqli_query($connectsms, $sms);

$stoploop = true;

while (($smsdata = mysqli_fetch_array($runsms)) && $stoploop == true) {
  if($smsdata['code'] == "p17")
  {
     if($p17 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p17'>
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
  if($smsdata['code'] == "p18")
  {
    if($p18 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p18'>
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
  if($smsdata['code'] == "p19")
  {
    if($p19 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p19'>
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

    <title>Smartphones</title>
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
            <img src="https://m.media-amazon.com/images/I/812YsUxpyfL._SX679_.jpg" width="175" height="175" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Samsung Galaxy M13</b></p>
              <p class="card-text">(Stardust Brown, 4GB, 64GB Storage) | 6000mAh Battery | Upto 8GB RAM with RAM Plus</p>
              <p class="card-text"><b>Price :</b> ₹9,699 (-35%)</p>
              <p class="card-text"><b>MRP :</b><del>₹14,999</del></p>
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
                  <input type="hidden" name="name" value="Samsung Galaxy M13">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/812YsUxpyfL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹9,699">
                  <input type="hidden" name="mrp" value="₹14,999">
                  <input type="hidden" name="discount" value="(-35%)">
                  <input type="hidden" name="about" value="(Stardust Brown, 4GB, 64GB Storage) | 6000mAh Battery | Upto 8GB RAM with RAM Plus">
                  <input type="hidden" name="priceint" value=9699.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Samsung Galaxy M13">
                      <input type="hidden" name="code" value="p17">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://www.dhresource.com/webp/m/0x0/f2/albu/g19/M01/51/F3/rBVap2FEoLqAND_sAAGc4JWVF1I738.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Xiaomi Mi Mix Fold 5G</b></p>
              <p class="card-text">12GB RAM 256GB 512GB ROM Snapdragon 888 Android 801 inch Foldable Full Screen</p>
              <p class="card-text"><b>Price :</b> ₹1,64,999 (-12%)</p>
              <p class="card-text"><b>MRP :</b><del>₹1,87,999</del></p>
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
                  <input type="hidden" name="name" value="Xiaomi Mi Mix Fold 5G">
                  <input type="hidden" name="image" value="https://www.dhresource.com/webp/m/0x0/f2/albu/g19/M01/51/F3/rBVap2FEoLqAND_sAAGc4JWVF1I738.jpg">
                  <input type="hidden" name="price" value="₹1,64,999">
                  <input type="hidden" name="mrp" value="₹1,87,999">
                  <input type="hidden" name="discount" value="(-12%)">
                  <input type="hidden" name="about" value="12GB RAM 256GB 512GB ROM Snapdragon 888 Android 801 inch Foldable Full Screen">
                  <input type="hidden" name="priceint" value=164999.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Xiaomi Mi Mix Fold 5G">
                      <input type="hidden" name="code" value="p18">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img style="margin-top: 10px;" src="https://m.media-amazon.com/images/I/513AqiuhSgL._SX569_.jpg" width="150px" height="187px" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Google Pixel 7 5G</b></p>
              <p class="card-text">8GB Ram 128GB Storage Resolution 1080p Full HD Manufacturer by Google</p>
              <p class="card-text"><b>Price :</b> ₹46,280 (-44%)</p>
              <p class="card-text"><b>MRP :</b><del>₹81,999</del></p>
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
                  <input type="hidden" name="name" value="Google Pixel 7 5G">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/513AqiuhSgL._SX569_.jpg">
                  <input type="hidden" name="price" value="₹46,280">
                  <input type="hidden" name="mrp" value="₹81,999">
                  <input type="hidden" name="discount" value="(-44%)">
                  <input type="hidden" name="about" value="8GB Ram 128GB Storage Resolution 1080p Full HD Manufacturer by Google">
                  <input type="hidden" name="priceint" value=46280.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="Google Pixel 7 5G">
                      <input type="hidden" name="code" value="p19">
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
