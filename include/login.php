<?php
    include("db.php");

    $username = $_POST["uname"];
    $password = $_POST["password"];

    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  

    $sql = "SELECT *from users where username = '$username' and password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  

    if($count == 1){  
        if($username == 'admin'){
            header("location: ../admin.php");
        }
        else{
        header("location: ../student.php");
        }
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }
?>