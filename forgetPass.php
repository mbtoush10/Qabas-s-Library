<?php
include("testServer.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Forget password - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleForgetPass.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">

</head>

<body style="background-image: url('./img/04.jpg');">
    <font color="white">
        <div>
            <h1 align="center">
                <font size="8">Qabas's</font>
                <font size="5"><sub>Library</sub></font>
            </h1>
        </div>

        <hr>

        <center>
            <div>
                <h2>Forgot Your Password?</h2><br>
                <h4>Please enter your email address. You will receive a code to reset your password.</h4><br>
                <form action="forgetPassPost.php" method="post">
                    <?php if (isset($messageErorr)) echo $messageErorr; ?>
                    <?php if (isset($emailError)) echo $emailError; ?>
                    <?php if (isset($successMessage)) echo $successMessage;
                    unset($successMessage) ?>

                    <img src="./img/03.png" width="100" /><br><br>
                    <label for="email">Email Address:</label><br>

                    <input type="email" id="email" name="email" placeholder="Enter year Email"><br><br>
                    <button type="submit" name="send">Send Reset Link</button>
                </form>
                <br>
                <p>
                    <a href="logIn.php">Back to Login</a>
                </p>
            </div>
        </center>

        <hr>

        <div>
            <p align="center">
                Qabas Library is a specialized library that provides a variety of books for all ages.<br><br>
                SM Team.<br>
                Contact us:<br>
                <a href="x.com"><img src="./img/X.png" width="40" align="top"></a>
                <a href="https://www.instagram.com/"><img src="./img/instagram.png" width="40" align="top"></a>
                <a href="https://www.facebook.com/"><img src="./img/facebook.png" width="40" align="top"></a>
            </p>
            <p align="center">By:Mustafa Btoush XD</p>
        </div>
    </font>
</body>

</html>