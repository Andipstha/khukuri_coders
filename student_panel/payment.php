<?php 
    session_start();
    $sesh = $_SESSION["username"];
    include("../include/db.php");
    $query = "SELECT qnty.food_name, qnty.qnty
              FROM qnty
              JOIN cart_id ON qnty.cart_id = cart_id.cart_id
              WHERE cart_id.cart_id IN (SELECT cart_id FROM cart_id WHERE stu_id = '$sesh')";
    $result = $conn->query($query);

    $fetch = "SELECT * from payment where stu_id = '$sesh'";
    $total = $conn->query($fetch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal</title>
</head>
<body>
    <p>STATEMENT</p>
    <table border="1px solid">
        <tr>
            <td>S.No.</td>
            <td>Food</td>
            <td>Quantity</td>
        </tr>
        <!-- Fetch data from rows -->
        <?php 
            $s_no = 0;
            while ($row = $result->fetch_assoc()) {
                ++$s_no;
                $food = $row['food_name'];
                $qunty = $row['qnty'];
        ?>
        <tr>
            <td><?php echo $s_no;?></td>
            <td><?php echo $food;?></td>
            <td><?php echo $qunty;?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2">Total</td>
            <td><?php 
                $sum =0;
                while ($row = $total->fetch_assoc()) {
                    $sum = $row['total'];
                }
                $_SESSION['final_payment'] = $sum;
                echo $sum;
            ?></td> 
        </tr>
        <tr>
            <td colspan="3">
                <form action="back_process/process_payment.php">
                    <button>Pay</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
