<?php 
include("testServer.php");

$err = 0;
if (isset($_POST["signUp"])) {
    $userName    = stripcslashes(strtolower($_POST["userName"]));
    $password    = stripcslashes($_POST["password"]);
    $conPassword = $_POST["confirmPassword"];
    $email       = stripcslashes($_POST["email"]);
    $firstName   = stripcslashes($_POST["firstName"]);
    $lastName    = stripcslashes($_POST["lastName"]);

    if (isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"])) {
        $day      = stripcslashes((int)$_POST["day"]);
        $month    = (int)$_POST["month"];
        $year     =  stripcslashes((int)$_POST["year"]);
    }

    $userName = htmlentities(mysqli_real_escape_string($conn, $userName));
    $password = htmlentities(mysqli_real_escape_string($conn, $password));
    $email    = htmlentities(mysqli_real_escape_string($conn, $email));
    $pass_md5    = md5($password);

    if (isset($_POST['gender'])) {
        $gender = htmlentities(mysqli_real_escape_string($conn, $_POST["gender"]));
    }


    //first name
    if (empty($firstName)) {
        $firstNameErorr = "<p class='error'>Please enter your first name!</p> ";
        $err            = 1;
    } elseif (filter_var($firstName, FILTER_VALIDATE_INT)) {
        $firstNameErorr = "<p class='error'>please enter a first name without numbers!</p><br>";
        $err            = 1;
    }

    //last name
    if (empty($lastName)) {
        $lastNameErorr = " <p class='error'> Please enter your last name! </p><br>";
        $err            = 1;
    } elseif (filter_var($lastName, FILTER_VALIDATE_INT)) {
        $lastNameErorr = " <p class='error'> please enter a last name without numbers!</p><br>";
        $err            = 1;
    }

    //email
    if (empty($email)) {
        $emailError = "<p class='error'>please enter Email</p><br>";
        $err        = 1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "<p class='error'>please enter a currect Email</p><br>";
        $err        = 1;
    }

    //username
    if (empty($userName)) {
        $userNameErorr = "<p class='error'>please enter Username</p> <br>";
        $err           = 1;
    } else {
        try {
            $sqli = "INSERT INTO users(userName) VALUES('$userName')";
            mysqli_query($conn, $sqli);
        } catch (mysqli_sql_exception) {
            $userNameErorr = "<p class='error'>username already taken!</p><br>";
            $err = 1;
        }
    }

    //gender
    if (empty($gender)) {
        $genderError = "<p class='error'>please choose gender </p><br>";
        $err         = 1;
    } elseif (!in_array($gender, ['male', 'female'])) {
        $genderError = "<p class='error'>please choose gender not a text </p><br>";
        $err         = 1;
    }

    //birthday
    if (empty($day) && empty($month) && empty($year)) {
        $birthdayError = "<br><p class='error'>please enter your date of birthday</p><br>";
        $err           = 1;
    } elseif (($day > 31 || $day <= 0) || ($month > 12 || $month <= 0) || ($year <= 1950 || $year > 2025)) {
        $birthdayError = "<br><p class='error'>please enter currect birth date!</p>";
        $err           = 1;
    }

    //password
    if (empty($password)) {
        $passwordError = "<p class='error'>please enter your password</p><br>";
        $err           =      1;
        require('signUp.php');
    } elseif ($password != $conPassword) {
        $passwordError = "<p class='error'>Your password is not matching</p><br>";
        $err           =      1;
        require('signUp.php');
    } elseif (strlen($password) < 8) {
        $passwordError = "<p class='error'>Your password needs to have a minimum 8 letters!</p><br>";
        $err           = 1;
        require('signUp.php');
    } else {
        if ($err == 0) {

            $sql = "UPDATE users SET name = CONCAT('$firstName', ' ', '$lastName'), 
            email = '$email', 
            password = '$password', 
            birthDate = '$year-$month-$day', 
            gender = '$gender', 
            reg_date = NOW() ,
            pass_md5 = '$pass_md5'
            WHERE userName = '$userName'";

            mysqli_query($conn, $sql);

            header('Location:logIn.php');
        } else {
            require('signUp.php');
        }
    }
    mysqli_close($conn);
}
