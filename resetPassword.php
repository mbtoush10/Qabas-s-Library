<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Reset Password - Shaker Library</title>
    <link rel="stylesheet" href="./css/styleResetPassword.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">
    <style>
        body {
            color: white;
        }
    </style>
</head>

<body style="background-image: url(./img/04.jpg);">
    <div class="container">
        <h1 align="center">Qabas's <font size="5"><sub>Library</sub></font>
        </h1>
        <hr><br>
        
        <form method="post" action="resetPassPost.php" align="center">
            <h2 align="center">Reset Your Password</h2><br>
            <img src="./img/03.png" width="100"/><br><br>

            <?php if (isset($passwordError)) echo $passwordError ?>
            <label for="new-password">Enter new password:</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="New Password"><br><br>

            <label for="confirm-password">Confirm new password:</label>
            <input type="password" id="conPassword" name="conPassword" placeholder="Confirm New Password"><br><br>
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p style="color: green; text-align: center;">' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
            ?>
            <button type="submit" name="reset">Reset Password</button><br>

            <p align="center">Remembered your password? <a href="login.php">
                    <font color="#ffa1f3">Login</font>
                </a></p>
        </form><br>
        <hr>
        <p align="center">Qabas Library is a specialized library that provides a variety of books for all ages.<br><br>
            SM Team. Contact us:
            <br>
            <a href="x.com/"><img src="./img/X.png" width="40"></a>
            <a href="https://www.instagram.com/"><img src="./img/instagram.png" width="40" align="top"></a>
            <a href="https://www.facebook.com/"><img src="./img/facebook.png" width="40" align="top"></a>
        </p>
        <p align="center">By:Mustafa Btoush XD</p>
    </div>
</body>

</html>