<?php
    session_start();
    echo($_SESSION['id']);
    include("../include/db.php");
    $result = $conn->query("SELECT * from menu"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <p>I am Student</p>
    <?php 
        if (isset($_SESSION["cartErrorMessage"])) {
    ?>
        <p><?php  echo $_SESSION["cartErrorMessage"]; ?></p>
    <?php
            unset($_SESSION["cartErrorMessage"]);
        }
    ?>
        <!-- Fetch data from rows -->
        <?php 
            while($row = $result->fetch_assoc()){
                $name = $row['name'];
                $price = $row['price'];
                $amt = $row['amt'];
        ?>
            <form action='back_process/add_to_cart.php' method="POST" enctype="multipart/form-data">
                <label for="food_name"><?php echo $name;?></label>
                <input name="food_name" type="text" value="<?php echo $name; ?>" hidden>
                <input name="stu_id" type="text" value="<?php echo $_SESSION['username']; ?>" hidden>
                <label><?php echo $price;?></label>
                <button>Add to Cart</button><br>
            </form>
        <?php } ?>

    <a href="review.html">Give Review</a><br>
    <a href="cart.php">My Cart</a><br>
    <a href="profile.php">My Profile</a><br>
    <button onclick="logOut()">Log Out</button>
</body>
</html>