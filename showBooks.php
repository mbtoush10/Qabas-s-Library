<?php
session_start();
include("testServer.php");

$sql = "SELECT * FROM books WHERE isAvailable = 1";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Books - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleShowBooks.css">
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">
    <script src="javaFile.js"></script>
    <style>
        .wrap-input-18 {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrap-input-18 .search {
            margin: 20px;
        }

        .wrap-input-18 .search>div {
            display: inline-block;
            position: relative;
        }

        .wrap-input-18 .search>div:after {
            content: "";
            background:
                white;
            width: 4px;
            height: 20px;
            position: absolute;
            top: 40px;
            right: 2px;
            transform: rotate(135deg);
        }

        .wrap-input-18 .search>div>input {
            color:
                white;
            font-size: 16px;
            background:
                transparent;
            width: 25px;
            height: 25px;
            padding: 10px;
            border: solid 3px white;
            outline: none;
            border-radius: 35px;
            transition: width 0.5s;
        }

        .wrap-input-18 .search>div>input::placeholder {
            color:
                #efefef;
            opacity: 0;
            transition: opacity 150ms ease-out;
        }

        .wrap-input-18 .search>div>input:focus::placeholder {
            opacity: 1;
        }

        .wrap-input-18 .search>div>input:focus,
        .wrap-input-18 .search>div>input:not(:placeholder-shown) {
            width: 250px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header>
            <h1>Qabas's <sub>Library</sub></h1>
        </header>

        <hr>

        <nav>
            <p>
                <a href="homePage.php">Main page,</a>
                <a href="showBooks.php">Show books,</a>
                <a href="addBook.php">Add book</a>
                <a href="rentBook.php">Rent Book</a>
                <a href="buyBook.php">Buy Book</a>
            </p>
        </nav>

        <section class="books-list">
            <p class="intro-text">Here is a list of books available in Qabas Library:</p>

            <div class="wrap-input-18">
                <form method="POST" action="">
                    <div class="search">
                        <div>
                            <input type="text" name="search" placeholder="Search . . .">
                        </div>
                    </div>
                </form>
            </div>
            <center>
                <button onclick="increaseFontSize()">+</button>
                <button onclick="decreaseFontSize()">-</button>
            </center>

            <ul id="bookList">
                <?php
                $searchQuery = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                    $search = mysqli_real_escape_string($conn, $_POST['search']);
                    $sql = "SELECT * FROM books WHERE isAvailable = 1 AND nameBook LIKE '%$search%'";
                } else {
                    $sql = "SELECT * FROM books WHERE isAvailable = 1";
                }
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0){
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<li><strong>' . $row['nameBook'] . '</strong> - ';
                        echo $row['year'] . ', ';
                        echo 'Author Name: ' . $row['autherName'] . ', ';
                        echo 'Sell Price: ' . $row['priceSell'] . ', ';
                        echo 'Rent Price: ' . $row['priceRent'] . '</li>';
                        echo 'ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ';
                    }
                } else {
                    echo '<li>No books available</li>';
                }
                mysqli_close($conn);
                ?>
            </ul>
        </section>

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
</body>

</html>