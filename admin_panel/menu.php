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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Menu</title>
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <table border="1px solid">
        <tr>
            <td>S.No.</td>
            <td>Name</td>
            <td>Price</td>
            <td>Amount</td>
            <td>Action</td>
        </tr>
        <!-- Fetch data from rows -->
        <?php 
            $s_no = 0;
            while ($row = $result->fetch_assoc() and $s_no<$row){
                $id = $row['id'];
                ++$s_no;
                $name = $row['name'];
                $price = $row['price'];
                $amt = $row['amt'];
        ?>
        <tr>
            <td><?php echo $s_no;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $price;?></td>
            <td><?php echo $amt;?></td>
            <td><form action="back_process/food_delete.php" method="POST" enctype="multipart/form-data"><input name='id' value="<?php echo $id;?>" hidden><button>Delete</button></form></td>
        </tr>
        <?php } ?>
    </table>
    <form id="blog" class="custom_form" action="back_process/food_add.php" method="POST" enctype="multipart/form-data">
        <div class="custom_field">
            <label for="name" class="required">Food Item</label><br>
            <input class="placeholder" type="text" required placeholder="Name" name="name">
        </div>
        <div class="custom_field">
            <label for="price" class="required">Price</label><br>
            <input class="placeholder" type="text" required placeholder="Price" name="price">
        </div>
        <div class="custom_field">
            <label for="amt" class="required">Amount</label><br>
            <input class="placeholder" type="text" required placeholder="Amount" name="amt">
        </div>
        <div class="custom_field custom_submit">
            <button class="custom_button_submit">
                <p class="submit_text submit_item button_text">Add</p>
            </button>
        </div>
    </form>
    <button onclick="logOut()">Log Out</button>
</body>
</html>