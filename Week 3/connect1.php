<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "sidehustle";

//create connection using sqli

$con = mysqli_connect($serverName, $username, $password, $dbName);

if(mysqli_connect_errno()){
    echo "DB Connection Failure";
    exit();
};

echo 'DB Connection Success';


?>