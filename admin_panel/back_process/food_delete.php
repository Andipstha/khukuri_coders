<?php
    include("../../include/db.php");

    $id = $_POST['id'];

    $sql = "DELETE from menu WHERE id = '$id'";

    if($conn->query($sql) === TRUE){
        header("Location: ../menu.php");
    }
    
?>