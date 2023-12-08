<?php
    include("include/db.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION["id"])) {
            if($_SESSION["username"] == "admin"){
                header("Location: admin_panel/admin.php");
            }
            else{
                header("Location: student_panel/student.php");
            }
        }
        if (isset($_SESSION["errorMessage"])) {
    ?>
        <p><?php  echo $_SESSION["errorMessage"]; ?></p>
    <?php
            unset($_SESSION["errorMessage"]);
        }
    ?>
    <form id="blog" class="custom_form" action="include/login.php" method="POST" enctype="multipart/form-data">
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
                <p class="submit_text submit_item button_text">Log In</p>
            </button>
        </div>
    </form>
</body>
</html>