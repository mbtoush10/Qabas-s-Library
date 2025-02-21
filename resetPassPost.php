<?php
session_start();
include("testServer.php");
$err = 0;
if (isset($_POST["reset"])) {
    $password    = stripcslashes($_POST["newPassword"]);
    $conPassword = stripcslashes($_POST["conPassword"]);
    $conPassword = htmlentities(mysqli_real_escape_string($conn,$conPassword));
    $password = htmlentities(mysqli_real_escape_string($conn, $password));
    $pass_md5    = md5($password);

    //password
    if (empty($password)) {
        $passwordError = "<p class='error'>please enter your password</p><br>";
        $err           =      1;
        include("resetPassword.php");
    } elseif ($password != $conPassword) {
        $passwordError = "<p class='error'>Your password is not matching</p><br>";
        $err           =      1;
        include("resetPassword.php");
    } elseif (strlen($password) < 8) {
        $passwordError = "<p class='error'>Password must have a minimum of 8 characters!</p><br>";
        $err           = 1;
        include("resetPassword.php");
    } else {
        $pSql = "SELECT password FROM users WHERE userName = '". $_SESSION['userName'] ."'";
        $pRes = mysqli_query($conn, $pSql);
        if ($pRes && mysqli_num_rows($pRes) > 0) {
            $row = mysqli_fetch_assoc($pRes);
            if ($row['password'] == $password) {
                $passwordError = "<p class='error'>The new password cannot be the same as the old password.</p><br>";
                $err           = 1;
                include("resetPassword.php");
            }
        }
    }
    //username
    $uSql = "SELECT userName FROM users WHERE userName = '". $_SESSION['userName'] ."'";
    $uRes = mysqli_query($conn, $uSql);

        if ($err == 0) {
            $sql = "UPDATE users SET password = '$password', pass_md5 = '$pass_md5'
            WHERE userName = '". $_SESSION['userName'] ."'";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                $_SESSION['message'] = '<p class="success">Password changed successfully!</p>';
                header("Location: resetPassword.php");
                exit();
            } else {
                $_SESSION['message'] = "<p class='error'>An error occurred while updating the password.</p>";
            }
        }
    }

