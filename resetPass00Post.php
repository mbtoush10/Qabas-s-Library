<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");
$err = 0;
if (isset($_POST['reset'])) {
    if (isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4'])) {
        $code = $_POST['1'] . $_POST['2'] . $_POST['3'] . $_POST['4'];
    } else {
        $messageErorr = "<p class='error'>Please enter the code !!</p>";
        $err          = 1;
        include('resetPassword00.php');
    }
    if ($err == 0) {
        $email = $_SESSION['email']; 

        $sql = "SELECT * FROM passReset WHERE email = '$email' AND reset_code = '$code' AND expiration_time > NOW()";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            header('Location: resetpassword.php');
            exit();
        }else{
            $messageErorr = "<p class='error'>Invalid or expired reset code!!</p>";
            include('resetPassword00.php');
        }
    }
}
