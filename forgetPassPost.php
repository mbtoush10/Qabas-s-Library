<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$err = 0;
if (isset($_POST["send"])) {
    $email             = stripcslashes($_POST["email"]);
    $email             = htmlentities(mysqli_real_escape_string($conn, $email));
    $_SESSION['email'] = $email;

    if (empty($email)) {
        $emailError = "<p class='error'>please enter Email</p><br>";
        $err        = 1;
        include("forgetPass.php");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "<p class='error'>please enter a currect Email</p><br>";
        $err        = 1;
        include("forgetPass.php");
    } else {
        if ($err == 0) {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            if (mysqli_num_rows($res) > 0) {
                $_SESSION['userName'] = $row['userName'];

                $resetCode = rand(1000, 9999);
                $sql = "INSERT INTO passReset (email, reset_code, expiration_time) 
                        VALUES ('$email', '$resetCode', DATE_ADD(NOW(), INTERVAL 5 MINUTE))";

                mysqli_query($conn, $sql);

                $mail = new PHPMailer(true);
                
                $successMessage = "<p class='success'>A reset code has been sent to your email</p><br>";
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; 
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'qabaslibrary241@gmail.com'; 
                    $mail->Password   = 'rnvo tmbt oeoc cbyi'; 
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;

                    $mail->setFrom('qabaslibrary241@gmail.com', 'qabas library');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject    = 'Reset Your Password';

                    $style            ="<body style='text-align:center; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;'>
                                      <img src='https://icons.veryicon.com/png/o/miscellaneous/website-icon/library-108.png' width='150px  align='center'>
                                      <p style='font-weight: bold; color: #222; font-size:17px; text-align:center'>Your Verification Code is: <br><b style='color: #222; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size:40px; text-align:center'>$resetCode</b></p>
                                      <h3 style='color:red;text-align:center'>Code expire in 5 minutes</h3>
                                      <h1 style='font-weight: bold; color:#222; font-size:25px;'>Find Me on:</h1>
                                      <div class='social' style='background: rgb(59, 59, 59); padding: 12px;'>
                                          <a style='color: #fff;font-size: 17px;margin-left: 20px;' href='https://X.com'>X</a>
                                          <a style='color: #fff;font-size: 17px;margin-left: 20px;' href='https://Facebook.com'>Facebook</a>
                                          <a style='color: #fff;font-size: 17px;margin-left: 20px;' href='https://instagram.com/'>Instagram</a>
                                      </div>
                                      </body>";
                    $mail->Body        = "$style";

                    $mail->send();
                    header("Location: resetPassword00.php");
                } catch (Exception $e) {
                    $emailError = "<p class='error'>Failed to send reset code. Please try again later. Error: {$mail->ErrorInfo}</p><br>";
                }
            } else {
                $messageErorr   = "<p class='error'>The email is not exsist!!</p><br>";
            }
        } else {
            include("forgetPass.php");
        }
        include("forgetPass.php");
    }
}