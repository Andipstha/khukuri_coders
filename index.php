<?php
    include("include/db.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login_body">
    <form id="blog" class="custom_form" action="include/signup.php" method="POST" enctype="multipart/form-data">
        <div class="custom_field">
            <label for="uname" class="required">Name</label><br>
            <input class="placeholder" type="text" required placeholder="Name" name="uname">
        </div>
        <div class="custom_field">
            <label for="password" class="required">Password</label><br>
            <input class="placeholder" type="password" required placeholder="Password" name="password">
        </div>
        <div class="custom_field custom_submit">
            <button class="custom_button_submit">
                <p class="submit_text submit_item button_text">Sign Up</p>
            </button>
            <a href="login.php">Log In</a>
        </div>
    </form>
</body>
</html>