<?php
require ('connectsms.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $cprice = $_POST['cprice'];
  $Mobile = $_POST['Mobile'];
  $pname = $_SESSION['pname'];
  $code = $_SESSION['code'];

    $sql = "INSERT INTO `sms` (`name`, `pname`, `code`, `cprice` , `Mobile`) VALUES ('$name', '$pname', '$code', '$cprice','$Mobile')";
    $run = mysqli_query($connectsms, $sql);

      if ($run) {
        echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Youe data successfully registered!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        echo '<script>setTimeout(function() { 
            document.getElementById("alert").style.display = "none"; 
            window.location.href = "Home.php"; 
        }, 1000);</script>';

      } else {
        echo "Error: " . mysqli_error($connectsms);
      }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SMS Form</title>
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
<!--  -->
<!--  -->
<hr>
<div class="container">
<div class="alert alert-success" role="alert">
  <h3 class="alert-heading">SMS send</h3>
  <h4>🛈&emsp;This system send SMS when Product price is less than or equal to your given price</h4>
  <hr>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Your Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Enter Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Your Budget price :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="price (only Integer)">
    </div>
  </div>
  <div class="text-center">
  <button type="" class="btn btn-primary">Send</button>
  </div>

</div>
  <br><br>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>