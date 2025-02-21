<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("testServer.php");
?>

<!DOCTYPE html>
<html lang="en">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Qabas's Library</title>
    <link rel="stylesheet" type="text/css" href="./css/styleError.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(./img/04.jpg);
            background-size: cover;
            background-position: center;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .i {
            background-color: rgba(47, 54, 72, 0.9);
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            width: 320px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 2em;
            color: #4c0137;
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            color: #ecf0f1;
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .inp {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            border: 1px solid #ecf0f1;
            border-radius: 5px;
            background: transparent;
            color: #4cd137;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input:focus {
            border-color: #3498db;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4cd137;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2ecc71;
        }

        p {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        a {
            color: #ffa1f3;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Qabas's <span style="font-size: 1.2em;">Library</span></h1>
        <hr>

        <form method="post" action="resetPass00Post.php">
            <div class="i">
                <?php if(isset($messageErorr)) echo $messageErorr; unset($messageErorr) ?>
                <h3>Enter the receive code sent to your email</h3>
                <div class="inp">
                    <input type="text" maxlength="1" autofocus name="1">
                    <input type="text" maxlength="1" name="2">
                    <input type="text" maxlength="1" name="3">
                    <input type="text" maxlength="1" name="4">
                </div>
                <button type="submit" name="reset">Reset Password</button>
            </div>
        </form>

        <p>Remembered your password? <a href="login.php">Login</a></p>
    </div>

    <script>
        let input = [...document.querySelectorAll('input')];

        input.forEach((element, index) => {
            element.addEventListener('keyup', () => {
                if (index + 1 !== input.length) {
                    input[index + 1].focus();
                }
            });
        });
    </script>

</body>

</html>
