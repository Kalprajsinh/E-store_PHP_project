
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  $price = $_POST['price'];
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
  <form method="post" action="buypage2.php">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" required>
      </div>
      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" Required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone No.</label>
      <input type="" class="form-control" id="inputPassword4" placeholder="Phone No." Required>
    </div>
  </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" rows="3" required></textarea>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" required>
        </div>
        <div class="form-group col-md-4">
          <label for="state">State</label>
          <select class="form-control" id="state" required>
            <option selected>Choose...</option>
            <option>Gujarat</option>
    <option>Andhra Pradesh</option>
    <option>Bihar</option>
    <option>Chhattisgarh</option>
    <option>Goa</option>
    <option>Haryana</option>
    <option>Himachal Pradesh</option>
    <option>Jharkhand</option>
    <option>Madhya Pradesh</option>
    <option>Maharashtra</option>
    <option>Manipur</option>
    <option>Punjab</option>
    <option>Rajasthan</option>
    <option>Tamil Nadu</option>
    <option>Uttar Pradesh</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="zip">ZIP Code</label>
          <input type="text" class="form-control" id="zip" required>
        </div>
      </div>
      <div class="form-group">
        <label for="payment">Payment Method</label>
        <select class="form-control" id="payment" required>
          <option selected>Choose...</option>
          <option>Credit Card</option>
          <option>Debit Card</option>
          <option>Net Banking</option>
        </select>
      </div>
      <!-- Button trigger modal -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
  <!--  -->
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>