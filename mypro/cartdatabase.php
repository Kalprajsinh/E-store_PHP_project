<?php

$connectcart = mysqli_connect("localhost","root","","cartiofo");

if($connectcart == false)
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}

?>

