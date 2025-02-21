<?php
session_start();
include("testServer.php");
$err = 0;
if (isset($_POST["rentBook"])) {
    $title  = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $year   = $_POST["year"];
    $rentTo = $_POST['rentTo'];

    if (empty($title)) {
        $titleErorr = "<p class='error'>Please enter the title of the book!</p> <br>";
        $err            = 1;
    }

    if (empty($author)) {
        $authorErorr = "<p class='error'>Please enter the author of the book!</p><br> ";
        $err            = 1;
    } elseif (filter_var($author, FILTER_VALIDATE_INT)) {
        $authorErorr = "<p class='error'>please enter a author without numbers!</p><br>";
        $err            = 1;
    }

    if (empty($year)) {
        $yearErorr = "<p class='error'>Please enter the year of the book!</p> <br>";
        $err            = 1;
    } elseif (!filter_var($year, FILTER_VALIDATE_INT)) {
        $yearErorr = "<p class='error'>please enter a currect Year of publication!</p><br>";
        $err            = 1;
    }

    if (empty($rentTo)) {
        $timeErorr = "<p class='error'>Please enter the rent time! </p><br>";
        $err            = 1;
        include("rentBook.php");
    } elseif ((!preg_match("/^\d{4}-\d{1,2}-\d{1,2}$/", $rentTo))) {
        $timeErorr = "<p class='error'>Please enter a currect rent time!</p> <br>";
        $err            = 1;
        include("rentBook.php");
    } elseif (strtotime($rentTo) < time()) {
        $timeErorr = "<p class='error'>Please enter a currect rent time!!</p> <br>";
        $err       = 1;
        include("rentBook.php");
    } else {
        if ($err == 0) {
            $sql = "SELECT * FROM books WHERE nameBook = '$title' AND isAvailable = true AND year = '$year' AND autherName ='$author'";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                $book = mysqli_fetch_assoc($res);
                $numBooks = $book['numberBooks'];

                if ($numBooks > 0) {
                    if ($numBooks == 1) {
                        $updateSql = "UPDATE books SET isAvailable  = false, numberBooks = numberBooks - 1 WHERE nameBook = '$title'";
                    } else {
                        $updateSql = "UPDATE books SET numberBooks = numberBooks - 1 WHERE nameBook = '$title'";
                    }
                    $res = mysqli_query($conn, $updateSql);
                }
                if (isset($_SESSION['id'])) {
                    $userSql = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'";
                    $userRes = mysqli_query($conn, $userSql);

                    $rentsql = "INSERT INTO rentedBook (bookID, id, startTime, endTime, rentalStatus)
                        VALUE ('" . $book['bookID'] . "','" . $_SESSION['id'] . "' , NOW() , '$rentTo', 'rented')";

                    $rentRes = mysqli_query($conn, $rentsql);
                    $_SESSION['message'] = "<p class='success'>The book {$title} is rented successfully!</p>";
                    header("Location: rentBook.php");
                    exit();
                }
            } else {
                $sqlErorr = 'The book not found!!';
                include("rentBook.php");
            }
        } else {
            include("rentBook.php");
        }
    }
}
