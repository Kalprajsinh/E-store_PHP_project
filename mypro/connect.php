<?php

$connect = mysqli_connect("localhost", "root", "", "userinfo");

if ($connect == false) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
}

?>