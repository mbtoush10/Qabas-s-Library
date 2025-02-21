<?php
session_start();
include('testServer.php');
if (isset($_SESSION['id']) && isset($_SESSION['userName'])) {
    $id = $_SESSION['id'];
    $userName = $_SESSION['userName'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleHomePage.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">
</head>

<body>
    <div class="main-container">
        <header>
            <h1>Qabas's <sub>Library</sub></h1>
        </header>

        <div class="welcome-section">
            <p class="greeting">Good <?php if(date("H")<=12) echo " morning " . $name; else echo" evening " . $name; ?> !</p>
            <p><span id="timeNow"></span></p>
            <p>You spent: <span id="timeSpent">0</span> Sec</p>
        </div>

        <div class="log-out-section" align="center">
            <form method="POST">
                <input type="submit" name="logOut" value="Log out" class="log-out-button">
            </form>
        </div>

        <hr>

        <div class="color-picker-container">
            <input type="color" id="BGC" placeholder="Change page's color">
            <button onclick="changeBGC()">Change Color</button>
        </div>

        <div class="navigation-links">
            <p>
                <a href=".\homePage.php">Main page,</a>
                <a href=".\showBooks.php">Show books,</a>
                <a href=".\addBook.php">Add book</a>
                <a href=".\rentBook.php">Rent Book</a>
                <a href=".\buyBook.php">Buy Book</a>
            </p>
        </div>

        <center>
            <img src=".\img\s02.png" width="350" alt="Qabas's Library Image">
        </center>

        <hr>

        <footer>
            <p>Qabas Library is a specialized library that provides a variety of books for all ages.<br><br>
                SM Team.<br>
                Contact us:<br>
                <a href="x.com/"><img src="./img/X.png" width="40" alt="X"></a>
                <a href="https://www.instagram.com/"><img src="./img/instagram.png" width="40" alt="Instagram"></a>
                <a href="https://www.facebook.com/"><img src="./img/facebook.png" width="40" alt="Facebook"></a>
            </p>
            <p align="center">By:Mustafa Btoush XD</p>
        </footer>
    </div>

    <script src="javaFile.js"></script>
</body>

</html>

<?php
if (isset($_POST["logOut"])) {
    include("logOut.php");
    exit();
}
?>