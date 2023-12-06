<?php
    include("db.php");

    $name = $_POST["uname"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES ('$name', '$password')";

    if($conn->query($sql)===TRUE){
        echo("Sign Up Succesful");
    }

?>