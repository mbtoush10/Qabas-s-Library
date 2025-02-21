<?php
session_start();
include("testServer.php");
$err = 0;

if (isset($_POST["addBook"])) {
    $title  = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $year   = $_POST["year"];

    if (empty($title)) {
        $titleErorr = '<p class="error">Please enter the title of the book! </p><br>';
        $err            = 1;
    }
    if (empty($author)) {
        $authorErorr = "<p class='error'>Please enter the author of the book!</p><br> ";
        $err            = 1;
    } elseif (filter_var($author, FILTER_VALIDATE_INT)) {
        $firstNameErorr = "please enter a author without numbers!<br>";
        $err            = 1;
    }

    if (empty($year)) {
        $yearErorr = "<p class='error'>Please enter the year of the book!</p> <br>";
        $err            = 1;
        include("addBook.php");
    } elseif (!filter_var($year, FILTER_VALIDATE_INT)) {
        $yearErorr = "<p class='error'>please enter a currect Year of publication!</p><br>";
        $err            = 1;
        include("addBook.php");
    } else {
        if ($err == 0) {
            $sql = "SELECT * FROM books WHERE nameBook = '$title' ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {

                $sql = "INSERT INTO books (nameBook,isAvailable,numberBooks,year,autherName )
                        VALUE ('$title', true , 1, '$year', '$author')";
                mysqli_query($conn, $sql);
                $_SESSION['alert'] = '<p>The book has been added successfully!!</p>';
                header('Location:addBook.php');
                exit();
            } else {
                $sql = "UPDATE books SET  numberBooks = numberBooks + 1";
                mysqli_query($conn, $sql);
                $_SESSION['alert'] = '<p >The book has been added successfully!!</p>';
                header('Location:addBook.php');
                exit();
            }
        } else {
            include('addBook.php');
        }
    }
    mysqli_close($conn);
}
