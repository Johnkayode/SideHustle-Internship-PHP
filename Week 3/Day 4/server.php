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
         //Supported File Extensions
        $extensions = array('jpg','jpeg','png','gif');
        $ext = explode('.', basename($_FILES['photo']['name']));
 
        $file_ext = end($ext);
        $imageName = "biodata-" . rand(10000,99999) . "." . $file_ext;
        $filesize = 52428800; //50mb = 50 * 1024 * 1024
 
         //Compares video size and file types
         if (($_FILES['photo']['size'] <= $filesize ) && in_array($file_ext, $extensions)){
             
             if (move_uploaded_file($_FILES['photo']['tmp_name'],'photos/'.$imageName)){
                $query = "INSERT INTO biodata (name, age, username, address, image_name) VALUES ('$name','$age','$username','$address','$imageName')";
                mysqli_query($con, $query);
                $_SESSION['msg'] = 'Biodata saved';
                header('location: crud.php'); //redirects to crud.php page
             }else{
                $_SESSION['msg'] = 'Upload Error';
                header('location: crud.php'); 
             };
         }else{
            $_SESSION['msg'] = 'Biodata File type/size not accepted';
            header('location: crud.php'); 
         };

        
    };

    //update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $address = $_POST['address'];

        //Supported File Extensions
        $extensions = array('jpg','jpeg','png','gif');
        $ext = explode('.', basename($_FILES['photo']['name']));
 
        $file_ext = end($ext);
        $imageName = "biodata-" . rand(10000,99999) . "." . $file_ext;
        $filesize = 52428800; //50mb = 50 * 1024 * 1024
 
         //Compares video size and file types
         if (($_FILES['photo']['size'] <= $filesize ) && in_array($file_ext, $extensions)){
             
             if (move_uploaded_file($_FILES['photo']['tmp_name'],'photos/'.$imageName)){
                mysqli_query($con, "UPDATE biodata SET name='$name', age='$age', username='$username', address='$address', image_name='$imageName' WHERE id=$id ");
                $_SESSION['msg'] = 'Biodata Updated';
                header('location: crud.php');
             }else{
                $_SESSION['msg'] = 'Biodata Upload Error';
                header('location: crud.php'); 
             };
         }else{
            $_SESSION['msg'] = 'Biodata File type/size not accepted';
            header('location: crud.php'); 
         };

        
        
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