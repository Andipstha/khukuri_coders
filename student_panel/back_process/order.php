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
            if ($conn->query($update_query2) === TRUE and $conn->query($update_query) === TRUE) {
                $delete_query = "DELETE FROM cart WHERE cart_id = $sanitized_cart_id";
                if($conn->query($delete_query) === TRUE){
                    $query = "SELECT DISTINCT cart_id FROM cart_id WHERE stu_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $sesh);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    $total = 0;
                    
                    // Loop through each distinct cart_id
                    while ($row = $result->fetch_assoc()) {
                        $specificCartId = $row['cart_id'];
                    
                        // Calculate total for each cart_id
                        $totalQuery = "SELECT SUM(qnty * menu.price) AS cart_total
                                       FROM qnty
                                       JOIN menu ON qnty.food_name = menu.name
                                       WHERE qnty.cart_id = ?";
                        $totalStmt = $conn->prepare($totalQuery);
                        $totalStmt->bind_param("i", $specificCartId);
                        $totalStmt->execute();
                        $totalResult = $totalStmt->get_result();
                    
                        if ($totalRow = $totalResult->fetch_assoc()) {
                            $cartTotal = $totalRow['cart_total'];
                            $total += $cartTotal;
                        }
                        else {
                            echo'milena kya ho?';
                        }
                    }
                    
                    // Update the payment table with the total for the active stu_id
                    // Insert the total into the payment table AFTER the loop
                    $updateQuery = "INSERT INTO payment (total, stu_id) VALUES (?, ?)";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param("is", $total, $sesh); // Assuming $total is an integer
                    $total = intval($total); // Ensure $total is an integer

                    if($updateStmt->execute()){
                        header("Location:../payment.php");
                    }
                    else {
                        echo"Yo chai namileko ho?";
                    }
                    
                }
                else {
                    echo "Aarko chai namileko raixa?";
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