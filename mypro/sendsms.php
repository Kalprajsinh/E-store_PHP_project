
<?php

require('connectsms.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['smsname'];
    $pname = $_POST['smspname'];
    $Mobile ='91'.$_POST['smsMobile'];
    $price = $_POST['smsprice'];

    echo "$name ,$pname ,$Mobile ,$price ";
    $m = "Dear $name,<br><br>

    Congratulations! You've successfully saved the $pname within your budget. The item is priced at $price. Don't miss out on this great deal!<br><br>

    Thank you for Visit my E-Store platform.<br>
    ";
    $apiKey = urlencode('NzQ0ZDUyMzQ0NDYxNGM2ZTM5NzE1ODYyNmQzNzc2NGQ=');
	
    $numbers = array($Mobile);           
    $sender = urlencode('TXTLCL');
    $message = rawurlencode($m); 

    $numbers = implode(',', $numbers);

    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Process your response here
    echo $response;

    header('Location: Home.php');
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--</title>
</head>
<body>
    
</body>
</html>


<!-- rihokag419@asuflex.com
     a12A!@#$%^ 
    
    
    
    MYSQL USERNAME
if0_34762956
MYSQL PASSWORD
3xVTi7C5djP7IgQ 
MYSQL DATABASE NAME
if0_34762956_XXX
(see below)
MYSQL HOSTNAME
sql303.infinityfree.com
MYSQL PORT (OPTIONAL)
3306
MySQL Databases
DATABASE	 
if0_34762956_MyData

USERNAME
if0_34762956
PASSWORD
3xVTi7C5djP7IgQ 
STATUS
LABEL
Website for e-storesitekalpraj.rf.gd
WEBSITE IP
185.27.134.137
HOSTING VOLUME
vol15_5
HOME DIRECTORY
/home/vol15_5/infinityfree.com/if0_34762956
CREATION DATE
2023-08-06
    
    


https://dash.infinityfree.com/accounts/if0_34762956
https://control.textlocal.in/templates/
http://e-storesitekalpraj.rf.gd/Home.php
    
    -->