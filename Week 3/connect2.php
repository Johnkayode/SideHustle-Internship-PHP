<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "sidehustle";

//create connection using pdo

try{
    $connector = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);

    $connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "DB Connection Success";
}
catch (PDOException $e){
    echo 'DB Connection Error <br>' . $e->getMessage();
};

?>