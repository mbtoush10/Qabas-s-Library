<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");

if (isset($_POST["userName"]) && isset($_POST["password"])) {
    $userName = stripcslashes(strtolower($_POST["userName"]));
    $pass_md5 = md5($_POST['password']);

    $userName = htmlentities(mysqli_real_escape_string($conn, $userName));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));

    if (empty($userName)) {
        $userNameErorr = "<p class='error'>please enter Username </p><br>";
        $err           = 1;
    }

    if (empty($password)) {
        $passwordError = "<p class='error'>please enter your password</p><br>";
        $err           =      1;
        include("logIn.php");
    } else {
        if (!isset($err)) {
            $sql = "SELECT * FROM users WHERE userName = '$userName' AND pass_md5='$pass_md5' ";

            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            if ($res && mysqli_num_rows($res) > 0) {
            if (($row['userName'] == $userName )&& ($row['pass_md5'] == $pass_md5)) {
                $_SESSION['userName']  = $row['userName'];
                $_SESSION['id']        = $row['id'];
                $_SESSION['name']      = $row['name'];
                $_SESSION['email']     = $row['email'];
                header('Location: homePage.php');
                exit();
            } }else {
                $userNameErorr = "<p class='error'>Wrong username or password </p><br>";
                include("logIn.php");
                exit();
            }
        }
    }
}
