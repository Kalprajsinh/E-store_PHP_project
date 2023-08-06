
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    echo"";
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

  <title>Buy page</title>
  
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
  
<hr>
<div class="container">
  <h3>Fill the details</h3>

  <form style="max-width: 600px; margin: 0 auto;padding: 20px; background-color: #ffffff; border: 1px solid #dddddd;">
    <img src="qr.jpg" alt="QR Code" style="display: block;
      margin: 0 auto;
      width: 50%;
      height: auto;
      margin-top: 20px;">
    <label for="fileInput" style=" display: block;
      margin-top: 20px; font-weight: bold;">Upload Receipt:</label>
    <input type="file" id="fileInput" name="fileInput" style="margin-top: 10px;  cursor: pointer;">
    <button type="submit" style="margin-top: 20px;
      padding: 10px 20px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      cursor: pointer;">Submit Payment</button>
  </form>

</div>
  <!--  -->
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>