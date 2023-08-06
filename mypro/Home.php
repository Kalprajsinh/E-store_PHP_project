<?php
require('cartdatabase.php');
require('connectsms.php');

session_start();

$sqli = "SELECT * FROM `cartinfo` ORDER BY id DESC LIMIT 1";
$runi = mysqli_query($connectcart, $sqli);

if ($runi) {
  $run_fetchi = mysqli_fetch_assoc($runi);
  $emaillast = $run_fetchi['email'];
  $idlast = $run_fetchi['id'];
}
$p1 = 1299;
$p2 = 323990;
$p3 = 5299;
$p4 = 109990;
$p5 = 9490;
$p6 = 9699;

$sms = "SELECT `name`, `pname`, `code`, `cprice` , `Mobile`,`id` FROM `sms`";
$runsms = mysqli_query($connectsms, $sms);

$stoploop = true;

while (($smsdata = mysqli_fetch_array($runsms)) && $stoploop == true) {
  if ($smsdata['code'] == "p1") {
    if ($p1 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p1'>
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
  if ($smsdata['code'] == "p2") {
    if ($p2 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p2'>
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
  if ($smsdata['code'] == "p3") {
    if ($p3 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p3'>
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
  if ($smsdata['code'] == "p4") {
    if ($p4 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p4'>
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
  if ($smsdata['code'] == "p5") {
    if ($p5 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p5'>
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
  if ($smsdata['code'] == "p6") {
    if ($p6 <= $smsdata['cprice']) {
      echo "
      <form name='myform' action='sendsms.php' method='post'>
        <input type='hidden' name='smsname' value='$smsdata[name]'>
        <input type='hidden' name='smspname' value='$smsdata[pname]'>
        <input type='hidden' name='smsprice' value='$p6'>
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

  <title>E-Store</title>
  <link rel="website icon" type="png" href="icon.png">
  <style>
    .abc {
      margin-top: -10px;
      color: white;
      -webkit-text-stroke: 1px black;
      font-size: 32px;
    }

    @media only screen and (max-width: 1285px) {
      .abc {
        color: white;
        -webkit-text-stroke: .4px black;
        font-size: 20px;
      }
    }

    @media only screen and (max-width: 900px) {
      .abc {
        color: white;
        -webkit-text-stroke: .4px black;
        font-size: 15px;
      }
    }

    @media only screen and (max-width: 600px) {
      .abc {
        color: white;
        -webkit-text-stroke: .3px black;
        font-size: 9px;
      }

      .hh {
        color: white;
        -webkit-text-stroke: .1px black;
        font-size: 5px;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Home.php"> <img src="icon.png" width="25px" height="25px"> E-Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php


        if (isset($_SESSION['logindone'])) {
          echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
       </li>
       ";
        } else {
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
          <img src="https://image.shutterstock.com/image-vector/shopping-cart-icon-vector-260nw-762885163.jpg" width='30' height='30' style="margin-right: 15px;"></a>
        <?php
        if (isset($_SESSION['logindone'])) {
          echo "
          $_SESSION[name]
          <img src='https://img.icons8.com/?size=512&id=41799&format=png' width='30' height='30''>
       ";
        }
        ?>
      </span>
    </div>
  </nav>
  <br><br><br>
  <?php
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
  ?>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img18/KD/banner_PC.jpg">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img19/AmazonPay/ScanAndPay/Organized/More/IndependenceDay2019/OnSitePromotion/Updated/More_Page_Banner_1500x300.jpg">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/Watches2021/Winterflipwatches/topbannerupdated/pc/L1-pc.jpg">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img19/AmazonPay/UPI/LandingPage/Un-regi/PCTop.jpg">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--  -->
  <nav style="height: 7px;">
    <div style="margin: 10px; margin-top: 30px; margin-bottom:0px; columns: 4;column-gap: 20px;">
      <div>
        <a style="text-decoration:none" href="Electronics.php">
          <div class="boxes_2_single card-body text-center" style="background: url('https://cpimg.tistatic.com/04607499/b/4/   Testing-of-Electrical-Electronics-Products.jpg') no-repeat center;background-size:cover;max-height:60px ;border-radius: 10px;">
            <h3 class="abc">Electronics</h3>
          </div>
        </a>
      </div>
      <div>

        <div>
          <a style="text-decoration:none" href="Home Decoration.php">
            <div class="boxes_2_single card-body text-center" style="background: url('https://i.ytimg.com/vi/IVifAAa39qs/maxresdefault.jpg') no-repeat center;background-size:cover;max-height:60px ;border-radius: 10px;">
              <h3 class="abc hh">Home Decoration</h3>
            </div>
          </a>
        </div>
        <div>
          <a style="text-decoration:none" href="Smartphones.php">
            <div class="boxes_2_single card-body text-center" style="background: url('https://www.androidauthority.com/wp-content/uploads/2022/12/EoY-2022-Best-Phones-on-leather.jpg') no-repeat center;background-size:cover;max-height:60px;border-radius: 10px;">
              <h3 class="abc">Smartphones</h3>
            </div>
          </a>
        </div>
        <div>
          <a style="text-decoration:none" href="Bluthooth.php">
            <div class="boxes_2_single card-body text-center" style="background: url('https://frankfurt.apollo.olxcdn.com/v1/files/vplvyre54cid1-UZ/image;s=2000x1000') no-repeat center;background-size:cover;max-height:60px;border-radius: 10px;">
              <h3 class="abc">Bluthooth</h3>
            </div>
          </a>
        </div>
      </div>
  </nav>
  <br>
  <br>
  <!-- prodects -->
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSGzLhs-p1lyCakyQSxYPyMNCw3CwMY3su8efL-0tPf6obkMhbmT9wW2gC4Xytk4h6Tuu7KexH77oL6xltx_JgHK5xDCPI42liUXTfO282AeN2cv7aE-29OdA&usqp=CAE" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>Fire-Boltt Ninja 3 Smartwatch</b></p>

              <p class="card-text">Sp02 Tracking, Over 100 Cloud based watch faces (Navy Blue)</p>
              <p class="card-text"><b>Price :</b> ₹1,299.00 (-84%)</p>
              <p class="card-text"><b>MRP :</b><del>₹7,999</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                    <input type="hidden" name="email" value="<?php
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

                                                                if (strpos($emaillast, '@') !== false) {
                                                                  $_SESSION['emaillast'] = "";
                                                                  echo $idlast;
                                                                } else {
                                                                  $_SESSION['emaillast'] = $emaillast;
                                                                  echo $emaillast;
                                                                }
                                                              }
                                                              ?>">
                    <input type="hidden" name="name" value="Fire-Boltt Ninja 3 Smartwatch">
                    <input type="hidden" name="image" value="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSGzLhs-p1lyCakyQSxYPyMNCw3CwMY3su8efL-0tPf6obkMhbmT9wW2gC4Xytk4h6Tuu7KexH77oL6xltx_JgHK5xDCPI42liUXTfO282AeN2cv7aE-29OdA&usqp=CAE">
                    <input type="hidden" name="price" value="₹1,299.00">
                    <input type="hidden" name="mrp" value="₹7,999">
                    <input type="hidden" name="discount" value="(-84%)">
                    <input type="hidden" name="about" value="Sp02 Tracking, Over 100 Cloud based watch faces (Navy Blue)">
                    <input type="hidden" name="priceint" value=1299.00>
                    <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>

                <form action="sms_form.php" method="post">
                  <input type="hidden" name="pname" value="Fire-Boltt Ninja 3 Smartwatch">
                  <input type="hidden" name="code" value="p1">
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
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

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
                  <input type="hidden" name="code" value="p2">
                  <button type="submit" class="btn btn-outline-info">Remind me</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://m.media-amazon.com/images/I/719kcUydqGL._SX679_.jpg" width="175" height="175" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>7 Running Horses</b></p>
              <p class="card-text">Rajasthani Antique Metal | Horses with LED Wall Décor (56 x 02 x 33 In) | Colour Multi
                | Style Art Deco</p>
              <p class="card-text"><b>Price :</b> ₹5,299 (-41%)</p>
              <p class="card-text"><b>MRP :</b><del>₹8,999</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                    <input type="hidden" name="email" value="<?php
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

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
                  <input type="hidden" name="code" value="p3">
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
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

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
                  <input type="hidden" name="code" value="p4">
                  <button type="submit" class="btn btn-outline-info">Remind me</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRqNFlBzEEakCCe9YnOjAx-Dd-4nPyYgaaN_XcIjzXDcfwrlGmygtqUTtYx-D2QgE9xX3yW0bhI8-4hIsglR3oCVJwJeXoI74_pSG_vqeSYRIVsp4LaN0Iw8Q&usqp=CAE" width="200" height="200" class="rounded mx-auto d-block">
            <div class="card-body">
              <p class="card-text text-center"><b>SONY 80W Multimedia Speaker</b></p>
              <p class="card-text">Power Source - USB Chargeable, Battery | Output Power - 80 W | Warranty - 1 Year</p>
              <p class="card-text"><b>Price :</b> ₹9,490.00 (-5%)</p>
              <p class="card-text"><b>MRP :</b><del>₹9,990.00</del></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="" method="post">
                    <input type="hidden" name="email" value="<?php
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

                                                                if (strpos($emaillast, '@') !== false) {
                                                                  $_SESSION['emaillast'] = "";
                                                                  echo $idlast;
                                                                } else {
                                                                  $_SESSION['emaillast'] = $emaillast;
                                                                  echo $emaillast;
                                                                }
                                                              }
                                                              ?>">
                    <input type="hidden" name="name" value="SONY 80W Multimedia Speaker">
                    <input type="hidden" name="image" value="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRqNFlBzEEakCCe9YnOjAx-Dd-4nPyYgaaN_XcIjzXDcfwrlGmygtqUTtYx-D2QgE9xX3yW0bhI8-4hIsglR3oCVJwJeXoI74_pSG_vqeSYRIVsp4LaN0Iw8Q&usqp=CAE">
                    <input type="hidden" name="price" value="₹9,490.00">
                    <input type="hidden" name="mrp" value="₹9,990.00">
                    <input type="hidden" name="discount" value="(-5%)">
                    <input type="hidden" name="about" value="Power Source - USB Chargeable, Battery | Output Power - 80 W | Warranty - 1 Year">
                    <input type="hidden" name="priceint" value=9490.00>
                    <button type="submit" class="btn btn-outline-info">Add to cart</button>
                  </form>
                </div>

                <form action="sms_form.php" method="post">
                  <input type="hidden" name="pname" value="SONY 80W Multimedia Speaker">
                  <input type="hidden" name="code" value="p5">
                  <button type="submit" class="btn btn-outline-info">Remind me</button>
                </form>
              </div>
            </div>
          </div>
        </div>
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
                                                              if (isset($_SESSION['logindone'])) {
                                                                echo $_SESSION['email'];
                                                              } else {

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
                  <input type="hidden" name="code" value="p6">
                  <button type="submit" class="btn btn-outline-info">Remind me</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav style="background-color: #333333;">
    <p style="font-size:1px"> ‎ </p>
    <p style="color: white; font-size: medium; cursor: pointer; text-align: center; margin-bottom:0px" onclick="topFunction()">Go To Top</p>
    <p></p>
    <br>
  </nav>

  <nav style="background-color: #262626;">
    <br>
  </nav>

  <div style="column-count: 4; color:whitesmoke;  text-align:center; font-size:10px; background-color: #262626; margin-top:0px">
    <p>
      Get to Know me<br>
      About me<br>
      student<br>
      B.tech in <br>
      IT Engineering<br>

    </p>
    <p>
      Connect with me<br>
      linkedin<br>
      Github<br>
      Instagram<br></p>
    <p>
      E-store<br>
      Web site<br>
      with cart<br>
      and SMS system<br>
      website<br></p>
    <p>
      localtext<br>
      API use<br>
      to send<br>
      SMS to user<br></p>
  </div>

  <nav style="background-color: #212121; display: flex; justify-content: center; align-items: center;margin-top:0px">
    <div style="overflow: hidden;">
      <img src="icon.png" width="80px" height="80px" style="margin: 20px;">
    </div>
    <p style="color:whitesmoke">kalpraj51@gmail.com</p>
  </nav>
  <nav style="background-color: #212121; display: flex; justify-content: center; align-items: center;margin-top:0px">
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDE2IDE1Ij4KICAgIDxkZWZzPgogICAgICAgIDxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjAlIiB4Mj0iODYuODc2JSIgeTE9IjAlIiB5Mj0iODAuMjAyJSI+CiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkQ4MDAiLz4KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjRkZBRjAwIi8+CiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4KICAgIDwvZGVmcz4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTS0yLTJoMjB2MjBILTJ6Ii8+CiAgICAgICAgPHBhdGggZmlsbD0idXJsKCNhKSIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNMTUuOTMgNS42MTRoLTIuOTQ4VjQuMTRjMC0uODE4LS42NTUtMS40NzMtMS40NzMtMS40NzNIOC41NmMtLjgxNyAwLTEuNDczLjY1NS0xLjQ3MyAxLjQ3M3YxLjQ3NEg0LjE0Yy0uODE4IDAtMS40NjYuNjU2LTEuNDY2IDEuNDc0bC0uMDA3IDguMTA1YzAgLjgxOC42NTUgMS40NzQgMS40NzMgMS40NzRoMTEuNzljLjgxOCAwIDEuNDc0LS42NTYgMS40NzQtMS40NzRWNy4wODhjMC0uODE4LS42NTYtMS40NzQtMS40NzQtMS40NzR6bS00LjQyMSAwSDguNTZWNC4xNGgyLjk0OHYxLjQ3NHoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0yIC0yKSIvPgogICAgPC9nPgo8L3N2Zz4K" alt="">
    <p style="color:whitesmoke; margin: 15px; margin-left:5px;">Become a Seller</p>
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDE1IDE1Ij4KICAgIDxkZWZzPgogICAgICAgIDxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjAlIiB4Mj0iODYuODc2JSIgeTE9IjAlIiB5Mj0iODAuMjAyJSI+CiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkQ4MDAiLz4KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjRkZBRjAwIi8+CiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4KICAgIDwvZGVmcz4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTS0zLTNoMjB2MjBILTN6Ii8+CiAgICAgICAgPHBhdGggZmlsbD0idXJsKCNhKSIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNMTAuNDkyIDNDNi4zNTMgMyAzIDYuMzYgMyAxMC41YzAgNC4xNCAzLjM1MyA3LjUgNy40OTIgNy41QzE0LjY0IDE4IDE4IDE0LjY0IDE4IDEwLjUgMTggNi4zNiAxNC42NCAzIDEwLjQ5MiAzem0zLjE4IDEyTDEwLjUgMTMuMDg4IDcuMzI3IDE1bC44NC0zLjYwN0w1LjM3IDguOTdsMy42OS0uMzE1TDEwLjUgNS4yNWwxLjQ0IDMuMzk4IDMuNjkuMzE1LTIuNzk4IDIuNDIyLjg0IDMuNjE1eiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTMgLTMpIi8+CiAgICA8L2c+Cjwvc3ZnPgo=" alt="">
    <p style="color:whitesmoke; margin: 15px; margin-left:5px;">Advertise</p>
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOCIgaGVpZ2h0PSIxNyIgdmlld0JveD0iMCAwIDE4IDE3Ij4KICAgIDxkZWZzPgogICAgICAgIDxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjAlIiB4Mj0iODYuODc2JSIgeTE9IjAlIiB5Mj0iODAuMjAyJSI+CiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkQ4MDAiLz4KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjRkZBRjAwIi8+CiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4KICAgIDwvZGVmcz4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTS0xLTFoMjB2MjBILTF6Ii8+CiAgICAgICAgPHBhdGggZmlsbD0idXJsKCNhKSIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNMTYuNjY3IDVIMTQuODVjLjA5Mi0uMjU4LjE1LS41NDIuMTUtLjgzM2EyLjQ5NyAyLjQ5NyAwIDAgMC00LjU4My0xLjM3NUwxMCAzLjM1bC0uNDE3LS41NjdBMi41MSAyLjUxIDAgMCAwIDcuNSAxLjY2N2EyLjQ5NyAyLjQ5NyAwIDAgMC0yLjUgMi41YzAgLjI5MS4wNTguNTc1LjE1LjgzM0gzLjMzM2MtLjkyNSAwLTEuNjU4Ljc0Mi0xLjY1OCAxLjY2N2wtLjAwOCA5LjE2NkExLjY2IDEuNjYgMCAwIDAgMy4zMzMgMTcuNWgxMy4zMzRhMS42NiAxLjY2IDAgMCAwIDEuNjY2LTEuNjY3VjYuNjY3QTEuNjYgMS42NiAwIDAgMCAxNi42NjcgNXptMCA2LjY2N0gzLjMzM3YtNWg0LjIzNEw1LjgzMyA5LjAyNWwxLjM1Ljk3NSAxLjk4NC0yLjdMMTAgNi4xNjdsLjgzMyAxLjEzMyAxLjk4NCAyLjcgMS4zNS0uOTc1LTEuNzM0LTIuMzU4aDQuMjM0djV6IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMSAtMSkiLz4KICAgIDwvZz4KPC9zdmc+Cg==" alt="">
    <p style="color:whitesmoke; margin: 15px; margin-left:5px;">Gift Cards</p>
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDE1IDE1Ij4KICAgIDxkZWZzPgogICAgICAgIDxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjAlIiB4Mj0iODYuODc2JSIgeTE9IjAlIiB5Mj0iODAuMjAyJSI+CiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNGRkQ4MDAiLz4KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjRkZBRjAwIi8+CiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4KICAgIDwvZGVmcz4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPHBhdGggZD0iTS0yLTNoMjB2MjBILTJ6Ii8+CiAgICAgICAgPHBhdGggZmlsbD0idXJsKCNhKSIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNOS41IDNDNS4zNiAzIDIgNi4zNiAyIDEwLjUgMiAxNC42NCA1LjM2IDE4IDkuNSAxOGM0LjE0IDAgNy41LTMuMzYgNy41LTcuNUMxNyA2LjM2IDEzLjY0IDMgOS41IDN6bS43NSAxMi43NWgtMS41di0xLjVoMS41djEuNXptMS41NTMtNS44MTNsLS42NzYuNjljLS41NC41NDgtLjg3Ny45OTgtLjg3NyAyLjEyM2gtMS41di0uMzc1YzAtLjgyNS4zMzgtMS41NzUuODc3LTIuMTIzbC45My0uOTQ1Yy4yNzgtLjI3LjQ0My0uNjQ1LjQ0My0xLjA1NyAwLS44MjUtLjY3NS0xLjUtMS41LTEuNVM4IDcuNDI1IDggOC4yNUg2LjVhMyAzIDAgMSAxIDYgMGMwIC42Ni0uMjcgMS4yNi0uNjk3IDEuNjg4eiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTIgLTMpIi8+CiAgICA8L2c+Cjwvc3ZnPgo=" alt="">
    <p style="color:whitesmoke; margin: 15px; margin-left:5px;">Help Center</p>
  </nav>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script>
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>