<?php
    include("../../include/db.php");

    $name = $_POST["name"];
    $price = $_POST["price"];
    $amt = $_POST["amt"];

    $sql = "INSERT INTO menu (name, price, amt) VALUES ('$name', '$price', '$amt')";

    if($conn->query($sql)===TRUE){
        header('Location: ../menu.php');
    }    
?>