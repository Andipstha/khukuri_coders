<?php
    session_start();
    $sesh = $_SESSION['username'];
    include("../include/db.php");
    $result = $conn->query("SELECT * from credit WHERE stu_id = '$sesh'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <table border="1px solid">
        <tr>
            <td>S.No.</td>
            <td>Remaining Credit</td>
        </tr>
        <!-- Fetch data from rows -->
        <?php 
            $s_no = 0;
            while ($row = $result->fetch_assoc() and $s_no<$row){
                ++$s_no;
                $credit = $row['credit'];
        ?>
        <tr>
            <td><?php echo $s_no;?></td>
            <td><?php echo $credit;?></td>
        </tr>
        <?php } ?>
    </table>
    <a href="student.php">Home</a>
</body>
</html>