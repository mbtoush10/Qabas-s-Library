<?php
session_start();
include("testServer.php");

$err = 0;
if (isset($_POST["buyBook"])) {
    $title  = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $year   = $_POST["year"];

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
        include("buyBook.php");
    } elseif (!filter_var($year, FILTER_VALIDATE_INT)) {
        $yearErorr = "<p class='error'>please enter a currect Year of publication!</p><br>";
        $err            = 1;
        include("buyBook.php");
    } elseif ((!preg_match("/^\d{4}$/", $year))) {
        $timeErorr = "<p class='error'>Please enter a currect Year time!</p> <br>";
        $err            = 1;
        include("buyBook.php");
    } else {
        if ($err == 0) {
            $sql = "SELECT * FROM books WHERE nameBook = '$title' AND isAvailable = true";
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
                $_SESSION['message'] = 'The book is bought successfully!';
                header(header: "Location: buyBook.php");
                exit();
            }else{
                $sqlErorr = "The book not found";
                include("buyBook.php");
            }
        } else {
            include("buyBook.php");
        }
    }
} else {
    include("buyBook.php");
}
