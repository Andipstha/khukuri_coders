<?php
    include("../../include/db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
        // Get the cart_id to be removed
        $cart_id_to_remove = intval($_POST['remove_item']);

        // SQL query to delete the entry with the specified cart_id from the 'cart' table
        $delete_query = "DELETE FROM cart WHERE cart_id = $cart_id_to_remove";

        // Execute the query
        if ($conn->query($delete_query) === TRUE) {
            header("Location: ../cart.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid request or missing cart_id.";
    }
?>