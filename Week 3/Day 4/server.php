<?php

    session_start();

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "crud";
    
    //create connection using sqli
    
    $con = mysqli_connect($serverName, $userName, $password, $dbName);
    

    $name = "";
    $age = 0;
    $username = "";
    $address = "";
    $id = 0;
    $edit_state = False;

    //Receives data from form when submit button is clicked

    if(isset($_POST['save'])){

        $name = $_POST['name'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $address = $_POST['address'];

        $query = "INSERT INTO biodata (name, age, username, address) VALUES ('$name','$age','$username','$address')";
        mysqli_query($con, $query);
        $_SESSION['msg'] = 'Biodata saved';
        header('location: crud.php'); //redirects to crud.php page
    };

    //update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        
        mysqli_query($con, "UPDATE biodata SET name='$name', age='$age', username='$username', address='$address' WHERE id=$id ");
        $_SESSION['msg'] = 'Biodata Updated';
        header('location: crud.php');
    };
    
    
    //delete

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
        mysqli_query($con, "DELETE FROM biodata WHERE id=$id ");
        $_SESSION['msg'] = 'Biodata deleted';
        header('location: crud.php');
    };
    

    $data = mysqli_query($con, "SELECT * FROM biodata");
    



?>