<?php
    include("../include/db.php");
    $result = $conn->query("SELECT * from feedback"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
</head>
<body>
    <table border="1px solid">
        <tr>
            <td>S.No.</td>
            <td>Student Id</td>
            <td>Name</td>
            <td>Feedback</td>
        </tr>
        <!-- Fetch data from rows -->
        <?php 
            $s_no = 0;
            while ($row = $result->fetch_assoc() and $s_no<$row){
                ++$s_no;
                $id = $row['stu_id'];
                $name = $row['name'];
                $feedback = $row['msg'];
        ?>
        <tr>
            <td><?php echo $s_no;?></td>
            <td><?php echo $id;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $feedback;?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>