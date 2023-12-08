<?php 
    session_start();
    $sesh = $_SESSION["username"];
    include("../include/db.php");
    $result = $conn->query("SELECT * from cart WHERE stu_id = '$sesh'");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Cart</title>
    </head>
    <body>
        <form method="POST" action="back_process/remove_from_cart.php">
            <!-- Loop through your cart items -->
            <?php while ($row = $result->fetch_assoc()) {
                $food = $row['food_name'];
                $cart_id = $row['cart_id'];
                $stu_id = $row['stu_id'];
            ?>
                <!-- Display the item and its associated cart_id -->
                <label><?php echo $food; ?></label>
                <input type="text" name="quantity[<?php echo $cart_id; ?>]" placeholder="Quantity">
                <input type="hidden" name="food_name[<?php echo $cart_id; ?>]" value="<?php echo $food; ?>">

                <!-- Add a button to remove the specific item -->
                <button type="submit" name="remove_item" value="<?php echo $cart_id; ?>">Remove</button><br>
            <?php } ?>
            <button formaction="back_process/order.php">Place Order</button>
        </form>
        <a href="student.php">Home</a>
    </body>
</html>