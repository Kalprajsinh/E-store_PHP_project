<?php

$connectsms = mysqli_connect("localhost","root","","sms");

if($connectsms == false)
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}

?>