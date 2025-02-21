<?php
include("testServer.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Log In - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleLogIn.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">

</head>

<body style="background-image: url(./img/04.jpg); background-size: cover;">
    <font color="white">
        <div>
            <h1 align="center">
                <font size="8">Qabas's</font>
                <font size="5"><sub>Library</sub></font>
            </h1>
        </div>

        <hr>

        <br><br><br><br>

        <center>
            <div>
                <form method="post" align="center" action="logInPost.php">
                    <font color="white" size="5">Log In</font> <br><br>
                <img src="./img/03.png" width="100"/><br><br>
                    <?php if (isset($userNameErorr)) echo $userNameErorr; ?>

                    <label for="userName">
                        <font color="white">Username:</font>
                    </label>
                    <input type="text" id="userName" name="userName" placeholder="Enter Your Username"
                    value="<?php echo isset($_POST['userName']) ? htmlspecialchars($_POST['userName']) : ''; ?>">
                    <br><br>


                    <?php if (isset($passwordError)) echo $passwordError; ?>

                    <label for="password">
                        <font color="white">Password:</font>
                    </label>
                    <input type="password" id="password" name="password" placeholder="Enter Your Password">
                    <br><br>

                    <a href="forgetPass.php">
                        <font color="#adc0f0">Forget Your Password?</font>
                    </a>
                    <br><br>

                    <input name="logIn" type="submit" value="   Log In   ">
                </form>

                <br>
                <form action="signUp.php" method="post">
                    <p>New User? <button type="submit" style="padding: 10px 20px;">Create Your Account</button></p>
                </form>
            </div>
        </center>

        <br><br><br><br>

        <hr>

        <div>
            <p align="center">
                Qabas Library is a specialized library that provides a variety of books for all ages.<br><br>
                SM Team.<br>
                Contact us:<br>
                <a href="x.com/"><img src="./img/X.png" width="40"></a>
                <a href="https://www.instagram.com/"><img src="./img/instagram.png" width="40" align="top"></a>
                <a href="https://www.facebook.com/"><img src="./img/facebook.png" width="40" align="top"></a>
            </p>
            <p align="center">By:Mustafa Btoush XD</p>
        </div>
    </font>
</body>

</html>