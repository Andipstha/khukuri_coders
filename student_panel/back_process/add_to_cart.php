<?php
    include("../../include/db.php");
    session_start();
    $sesh = $_SESSION['username'];


    $food_item = $_POST['food_name'];
    $cart_id = rand(100000,999999);
    $stu_id = $_POST['stu_id'];

    $check = $conn->query("SELECT * from cart where stu_id = '$sesh' and food_name = '$food_item'");
    $food_name = mysqli_num_rows($check);

    if($food_name === 1){
        $_SESSION["cartErrorMessage"] = "Already Added";
        header("Location: ../student.php");
    }

    else{
        $sql = "INSERT into cart (cart_id, stu_id, food_name) VALUES ('$cart_id', '$stu_id', '$food_item')";
        $conn->query($sql);
        header("Location: ../student.php");
    }
?>