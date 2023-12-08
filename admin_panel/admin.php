<?php
    session_start();
    echo($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="../assets/js/main.js"></script>
</head>
<body>
    <p>I am Admin</p>
    <a href="menu.php">Menu</a>
    <a href="feedback.php">Feedbacks</a>
    <button onclick="logOut()">Log Out</button>
</body>
</html>