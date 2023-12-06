<?php
    session_start();
    $seshid = session_create_id();
    echo($seshid);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <p>I am Admin</p>
</body>
</html>