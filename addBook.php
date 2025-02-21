<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("testServer.php") ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add a book - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleAddBook.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="al.js"></script>

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
            <div>
                <h2>Add Book</h2>
                <form action="addBookPost.php" method="post">
                    <?php if (isset($titleErorr)) echo $titleErorr; ?>

                    
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo "
                        <script>
                            Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: '" . $_SESSION['alert'] . "',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        </script>";
                        unset($_SESSION['alert']); 
                    }
                    ?>
                    <label>Book Title:</label>
                    <input type="text" name="title" placeholder="Enter book's title"
                    value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>"><br><br>

                    <?php if (isset($authorErorr)) echo $authorErorr; ?>
                    <label>Author:</label>
                    <input type="text" name="author" placeholder="Enter book's author"
                    value="<?php echo isset($_POST['author']) ? htmlspecialchars($_POST['author']) : ''; ?>"><br><br>

                    <?php if (isset($yearErorr)) echo $yearErorr; ?>
                    <label>Year of publication:</label>
                    <input type="text" name="year" placeholder="Enter the year of publication"
                    value="<?php echo isset($_POST['year']) ? htmlspecialchars($_POST['year']) : ''; ?>"><br><br>

                    <button type="submit" name="addBook">Add Book</button>
                    
                </form>
            </div>
        </center>

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