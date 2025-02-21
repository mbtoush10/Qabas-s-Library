<?php include("testServer.php") 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleSignUp.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">

</head>

<body style="background-image: url(./img/04.jpg);">
    <font color="white">
        <h1 align="center">
            <font size="8">Qabas's</font>
            <font size="5"><sub>Library</sub></font>
        </h1>

        <hr>
        <form align="center" color="white" method="post" action="signUpPost.php">
            <font color="white">
                <h2>Sign Up</h2>
                <img src="./img/03.png" width="100"/><br><br>
                <?php if (isset($firstNameErorr)) echo $firstNameErorr;
                if (isset($lastNameErorr)) echo $lastNameErorr; ?>
                First Name: <input type="text" name="firstName" placeholder="Enter your First Name" 
                value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>">

                Last Name: <input type="text" name="lastName" placeholder="Enter your Last name" 
                value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>"><br><br>

                <?php if (isset($emailError)) echo $emailError; ?>
                Email: <input type="email" name="email" placeholder="Enter your email"  
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

                <?php if (isset($userNameErorr)) echo $userNameErorr; ?>
                UserName: <input type="text" name="userName" placeholder="Enter your UserName" 
                value="<?php echo isset($_POST['userName']) ? htmlspecialchars($_POST['userName']) : ''; ?>"><br><br>

                <?php if (isset($passwordError)) echo $passwordError; ?>
                Password: <input type="password" name="password" placeholder="Enter your password"><br><br>
                Confirm Password: <input type="password" name="confirmPassword" placeholder="confirm-password"><br><br>

                Gender:
                <?php if (isset($genderError)) echo $genderError; ?>
                <input type="radio" name="gender" value="female">Female<input value="male" name="gender" type="radio">Male<br><br>
                Date of birth:
                <?php if (isset($birthdayError)) echo $birthdayError; ?>
                <br>Day: <input type="text" name="day" size="1" placeholder="Day">
                Mounth:
                <select name="month">
                    <option disabled selected>Select Month</option>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                </select>
                Year: <input name="year" type="text" size="4" placeholder="YYYY"><br><br>

                <input type="submit" name="signUp" value="    Sign up     "><br><br>
                <input type="checkbox" required>
                <font>You agree to our Terms, Privacy Policy and Cookies Policy.<sup>
                        <font color="red">*</font>
                    </sup></font>
            </font>
        </form>




        <hr>
        <p align="center">Qabas Library is a specialized library that provides a variety of books for all ages.<br><br>
            SM Team.
            Contact us:
            <br>
            <a href="x.com/"><img src="./img/X.png" width="40"></a>
            <a href="https://www.instagram.com/"><img src="./img/instagram.png" width="40" align="top"></a>
            <a href="https://www.facebook.com/"><img src="./img/facebook.png" width="40" align="top"></a>
        </p>

        <p align="center">By:Mustafa Btoush XD</p>
    </font>
</body>

</html>