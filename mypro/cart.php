<?php
require('cartdatabase.php');
session_start();
if (isset($_SESSION['logindone'])) {
  $sql = "SELECT `email`, `name`, `image`, `price`, `mrp`, `discount`, `about`, `id` FROM `cartinfo` WHERE email = '" . $_SESSION['email'] . "'";
} else
if (!isset($_SESSION['logindone'])) {
  $sql = "SELECT `email`, `name`, `image`, `price`, `mrp`, `discount`, `about`, `id` FROM `cartinfo` WHERE email = '" . $_SESSION['emaillast'] . "'";
}
$run = mysqli_query($connectcart, $sql);
$num = mysqli_num_rows($run);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>E-Store cart</title>
  <style>
    .cart-container{
      padding-left: 17px;
      padding-top: 10px;
      width: 350px;
      height: 240px; position: absolute;
      top: 167px;
      right: 16px; 
      background-color: #ffffff;
      border-radius:5px;
      border: 2px solid #DADADA;
      font-size: 30px;
      font-weight: 500;
    }
  .text{
    margin-top: 90px;
    margin-left: 10px;
    font-size: 12px;
    color:green ;
  }
  .text2{
    margin-top: 25px;
    font-size: 15px;
    color:#ff4040;
  }
  .buy{
    margin-left: 95px;
    font-size: 18px;
    margin-top: 15px;
  }
    
  @media only screen and (max-width: 950px) {
    .cart-container {
      padding-left: 5px;
      padding-top: 0px;
      width: 150px;
      height: 164px; position: absolute;
      top: 167px;
      right: 16px; 
      background-color: #ffffff;
      border-radius:5px;
      border: 2px solid #DADADA;
      font-size: 15px;
      font-weight: 600;
  }
  .text{
    margin-top: 30px;
    font-size: 11px;
    color:green ;
  }
  .text2{
    margin-top: 20px;
    font-size: 11px;
    color:#ff4040;
  }
  .buy{
    margin-left: 25px;
    font-size: 11px;
    margin-top: 15px;
  }
  }

  @media only screen and (max-width: 600px) {
    .cart-container {
      padding-left: 5px;
      padding-top: 0px;
      width: 100px;
      height: 158px; position: absolute;
      top: 167px;
      right: 16px; 
      background-color: #ffffff;
      border-radius:5px;
      border: 2px solid #DADADA;
      font-size: 15px;
      font-weight: 600;
  }
  .text{
    margin-top: 30px;
    font-size: 8px;
    color:green ;
  }
  .text2{
    margin-top: 17px;
    font-size: 8px;
    color:#ff4040;
  }
  .buy{
    margin-left: 2px;
    font-size: 10px;
    margin-top: 10px;
  }
  }
  </style>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
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
        <a href="cart.php">my cart</a>
        <img alt="cart.php" style="margin-right: 15px;" src='https://image.shutterstock.com/image-vector/shopping-cart-icon-vector-260nw-762885163.jpg' width='30' height='30'>
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

    $name = $_POST['namep'];
    if (isset($_SESSION['logindone'])) {
      $sqlq = "DELETE FROM `cartinfo` WHERE name = '$name' AND email = '" . $_SESSION['email'] . "'";
    } else
  if (!isset($_SESSION['logindone'])) {
    $sqlq = "DELETE FROM `cartinfo` WHERE name = '$name' AND email = '" . $_SESSION['emaillast'] . "'";
    }
    $runq = mysqli_query($connectcart, $sqlq);
  
    if ($runq) {
      echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> item removed !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>';
      header("Refresh:0.3");
    }
  }
  
  ?>

  <!-- -->
  <br>
  <h2 style="margin-left: 40px;"><b>MY CART</b></h2>
  <?php
  if ($num > 0) {
    while ($products = mysqli_fetch_array($run)) {
  ?>
      <hr>
      <div class="card w-75">
        <div class="card-body">
          <h5 class="card-title"><?php echo $products['name'] ?></h5>
          <div class="container-fluid">
            <div class="row">
              <div>
                <img style="margin-right: 30px;" src="<?php echo $products['image'] ?>" width="200" height="200" class="d-block">
              </div>
              <div>
                <p class="card-text"><?php echo $products['about'] ?></p>
                <br>
                <br>
                <p class="card-text"><b>Price :</b><?php 
                echo $products['price'], $products['discount'] ?></p>
                <p class="card-text"><b>MRP :</b><del><?php echo $products['mrp'] ?></del></p>
                <form action="" method="post">
                  <input type="hidden" name="namep" value="<?php echo $products['name'] ?>">
                  <button type="submit" name="Remove"class="btn btn-outline-warning">Remove</button>
                </form>
              </div>
            </div>
          </div>


        </div>
      </div>
  <?php
    }
  }
  ?>
  <!--  -->
  <?php
   if ($num == 0)
   {
     echo "
           <img src='https://skoozo.com/assets/img/empty-cart.png'>
           <a href='Home.php'>
           <br>
           <button style='position: absolute; left:180px' type='submit' class='btn btn-outline-warning'>Continue shopping</button>
           </a>
           ";

   }
  else
  if(isset($_SESSION['email']))
  {
    echo "<hr>
    <div class='cart-container'>
    
    Total Price : ₹";
     
     $sql = "SELECT SUM(priceint) AS total_price FROM `cartinfo` WHERE email = '" . $_SESSION['email'] . "'";
     $result = mysqli_query($connectcart, $sql);
     if ($result) {
  
         $row = mysqli_fetch_assoc($result);
  
         $total_price = $row['total_price'];
         echo  number_format($total_price, 2);
     }
     echo " </h3> <hr>";
     echo "<h6 class='text'>✅ Your order is eligible for FREE Home Delivery.</h6>";
     echo "<form action='buypage.php' method='post'><div class='buy'>
     <input type='hidden' name='price' value='<?php echo $total_price ?>'>
     <button type='submit' class='btn-warning' name='buy'>Proceed to Buy</button></div></form>";
     if(!isset($_SESSION['logindone']))
      {
        echo "<h6 class='text2'>⚠ If you want to save your items in cart then please login</h6>";
      }
     echo "</div>";
  }
  else
  {
    echo "<hr>
    <div class='cart-container'>
    
    Total Price : ₹";
 
     $sql = "SELECT SUM(priceint) AS total_price FROM `cartinfo` WHERE email = '" . $_SESSION['emaillast'] . "'";
     $result = mysqli_query($connectcart, $sql);
     if ($result) {
  
         $row = mysqli_fetch_assoc($result);
  
         $total_price = $row['total_price'];
         echo  number_format($total_price, 2);
     }
     echo " </h3> <hr>";
     echo "<h6 class='text'>✅ Your order is eligible for FREE Home Delivery.</h6>";
     echo "<form action='buypage.php' method='post'><div class='buy'><button type='submit' class='btn-warning' name='buy'>Proceed to Buy</button></div></form>";
     if(!isset($_SESSION['logindone']))
      {
        echo "<h6 class='text2'>⚠ If you want to save your items in cart then please login</h6>";
      }
     echo "</div>";
    
  }
  ?>
  <!--  -->
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>