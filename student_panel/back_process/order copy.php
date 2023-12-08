<?php
include("../../include/db.php");
session_start();
$sesh = $_SESSION["username"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $cart_id => $quantity) {
            // Sanitize inputs
            $sanitized_quantity = intval($quantity);
            $sanitized_cart_id = intval($cart_id);
            $food_name = $_POST['food_name'][$cart_id];

            // Update the 'qnty' table with the new quantity for the specific cart_id
            $update_query = "INSERT into qnty (cart_id, qnty, food_name) VALUES ('$sanitized_cart_id', '$sanitized_quantity', '$food_name')";
            $update_query2 = "INSERT into cart_id (cart_id, stu_id) VALUES ('$sanitized_cart_id', '$sesh')";

            // Execute the query
            if ($conn->query($update_query) === TRUE and $conn->query($update_query2) === TRUE) {
                $delete_query = "DELETE FROM cart WHERE cart_id = $sanitized_cart_id";
                if($conn->query($delete_query) === TRUE){
                    echo"Ordered Successfully";
                }
                $id = $conn->query("SELECT cart_id FROM cart_id WHERE stu_id ='$sesh'");
                while($row = $id->fetch_assoc()){
                    $id = $row['cart_id'];
                    echo $id;
                }
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "No quantity data received.";
    }
} else {
    echo "Invalid request method.";
}
?>