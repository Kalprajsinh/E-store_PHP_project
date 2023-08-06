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
$p20 = 1499;
$p21 = 4399;

$sms = "SELECT `name`, `pname`, `code`, `cprice` , `Mobile`,`id` FROM `sms`";
$runsms = mysqli_query($connectsms, $sms);

$stoploop = true;

while (($smsdata = mysqli_fetch_array($runsms)) && $stoploop == true) {
  if($smsdata['code'] == "p20")
  {
     if($p20 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p20'>
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
  if($smsdata['code'] == "p21")
  {
    if($p21 <= $smsdata['cprice'])
     {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p21'>
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

    <title>Bluthooth items</title>
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
            <img src="https://m.media-amazon.com/images/I/61aasAbKvvL._SX679_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>realme TechLife Buds T100</b></p>
      
              <p class="card-text">AI ENC for Calls, Google Fast Pair, 28 Hours Total Playback with Fast Charging and Low Latency Gaming Mode (Black)</p>
              <p class="card-text"><b>Price :</b> ₹1,499 (-50%)</p>
              <p class="card-text"><b>MRP :</b><del>₹2,999</del></p>
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
                  <input type="hidden" name="name" value="realme TechLife Buds T100">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/61aasAbKvvL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹1,499">
                  <input type="hidden" name="mrp" value="₹2,999">
                  <input type="hidden" name="discount" value="(-50%)">
                  <input type="hidden" name="about" value="AI ENC for Calls, Google Fast Pair, 28 Hours Total Playback with Fast Charging and Low Latency Gaming Mode (Black)">
                  <input type="hidden" name="priceint" value=1499.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="realme TechLife Buds T100">
                      <input type="hidden" name="code" value="p20">
                      <button type="submit" class="btn btn-outline-info">Remind me</button>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://m.media-amazon.com/images/I/71cV-ickxOL._SX679_.jpg" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>New Echo Dot 5th Gen Smart speaker</b></p>
              <p class="card-text">Bigger sound, Motion Detection, Temperature Sensor, Alexa and Bluetooth| Blue</p>
              <p class="card-text"><b>Price :</b> ₹4,399 (-20%)</p>
              <p class="card-text"><b>MRP :</b><del>₹5,499</del></p>
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
                  <input type="hidden" name="name" value="New Echo Dot 5th Gen Smart speaker">
                  <input type="hidden" name="image" value="https://m.media-amazon.com/images/I/71cV-ickxOL._SX679_.jpg">
                  <input type="hidden" name="price" value="₹4,399">
                  <input type="hidden" name="mrp" value="₹5,499">
                  <input type="hidden" name="discount" value="(-20%)">
                  <input type="hidden" name="about" value="Bigger sound, Motion Detection, Temperature Sensor, Alexa and Bluetooth| Blue">
                  <input type="hidden" name="priceint" value=4399.00>
                  <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>
                <form action="sms_form.php" method="post">
                      <input type="hidden" name="pname" value="New Echo Dot 5th Gen Smart speaker">
                      <input type="hidden" name="code" value="p21">
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
