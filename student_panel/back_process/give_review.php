<?php
    include("../../include/db.php");

    $stu_id = $_POST['stu_id'];
    $name = $_POST['name'];
    $review = $_POST['review'];

    $sql = "INSERT into feedback (stu_id, name, msg) VALUES ('$stu_id', '$name', '$review')";

    if($conn->query($sql) === TRUE) {
        echo 'Review Added Successfully';
    }
?>