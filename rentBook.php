<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Request Book - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleRentBook.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">

</head>

<body bgcolor="0c164d">
    <font color="white">
        <div>
            <h1 align="center">
                <font size="8">Qabas's</font>
                <font size="5"><sub>Library</sub></font>
            </h1>
        </div>

        <hr>

        <div>
            <p align="center">
                <a href=".\homePage.php">
                    <font color="#ffa1f3">( Main page,</font>
                </a>
                <a href=".\showBooks.php">
                    <font color="#ffa1f3">Show books, </font>
                </a>
                <a href=".\addBook.php">
                    <font color="#ffa1f3">Add book</font>
                </a>
                <a href=".\rentBook.php">
                    <font color="#ffa1f3">Rent Book</font>
                </a>
                <a href=".\buyBook.php">
                    <font color="#ffa1f3">Buy Book)</font>
                </a>
            </p>
        </div>
        <center>
            <form action="rentBookPost.php" method="post">
                <fieldset>
                    <legend>Rent Book</legend>
                    <?php if (isset($titleErorr)) echo $titleErorr;
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    } ?>
                    <label for="bookName">Book Title:</label>
                    <input type="text" id="title" name="title" placeholder="Enter book title"
                    value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>"><br><br>

                    <?php if (isset($authorErorr)) echo $authorErorr ?>
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" placeholder="Enter author's name"
                    value="<?php echo isset($_POST['author']) ? htmlspecialchars($_POST['author']) : ''; ?>"><br><br>

                    <?php if (isset($yearErorr)) echo $yearErorr ?>
                    <label for="year">Year of Publication:</label>
                    <input type="text" id="year" name="year" placeholder="Enter year of publication"
                    value="<?php echo isset($_POST['year']) ? htmlspecialchars($_POST['year']) : ''; ?>"><br><br>

                    <?php if (isset($timeErorr)) echo $timeErorr ?>
                    <label for="rentTo">Rent to:</label>
                    <input type="text" id="rentTo" name="rentTo" placeholder="Rent To(YYYY-MM-DAY)"
                    value="<?php echo isset($_POST['rentTo']) ? htmlspecialchars($_POST['rentTo']) : ''; ?>"><br><br>

                    <button type="submit" name="rentBook">Rent Book</button><br>
                    <script>
                        <?php
                        if (isset($sqlErorr)) {
                            echo "alert('" . addslashes($sqlErorr) . "');";
                        }
                        if (isset($_SESSION['message'])) {
                            echo "alert('" . addslashes($_SESSION['message']) . "');";
                            unset($_SESSION['message']);
                        }
                        ?>
                    </script>


                </fieldset>
            </form>
        </center>
        </div>

        <br><br><br>

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