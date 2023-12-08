<?php 
    session_start();
    $sesh = $_SESSION["username"];
    $deductCredit = $_SESSION['final_payment'];
    include("../../include/db.php");

    $sqlInsertData = "INSERT INTO pending_order (cart_id, stu_id, qnty, food)
    SELECT c.cart_id, c.stu_id, q.qnty, q.food_name
    FROM cart_id c
    JOIN qnty q ON c.cart_id = q.cart_id";

    $sqlDeleteData = "DELETE FROM cart_id where stu_id ='$sesh'";
    $sqlDeductCredit = "UPDATE credit
    SET credit = credit - $deductCredit
    WHERE stu_id = '$sesh'";
    $sqlDeletePayment = "DELETE from payment where stu_id='$sesh'";

    if ($conn->query($sqlInsertData) === TRUE) {
        if ($conn->query($sqlDeductCredit) === TRUE) {
            if ($conn->query($sqlDeleteData) === TRUE) {
                if ($conn->query($sqlDeletePayment) === TRUE) {
                    header("Location: ../student.php");
                } else {
                    echo "delete gareko milena" . $conn->error;
                }
            } else {
                echo "delete gareko milena 1" . $conn->error;
            }
        } else {
            echo "delete gareko milena 2" . $conn->error;
        }
    } else {
        echo "Insert nai milena 3" . $conn->error;
    }
?>