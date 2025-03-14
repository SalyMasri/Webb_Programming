<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="sty.css" type="text/css">
    <title>Del 2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div id="login">
        <form action="login.php" method="post">
            <p>
                <label for="user">Username:</label>
                <input type="text" id="user" name="user">
            </p>
            <p>
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass">
            </p>
            <p>
                <input type="submit" id="loginbtn" value="Login">
            </p>
        </form>
    </div>

    <?php
    // Checks that the input fields are populated for username and password
    if (isset($_POST['user']) && isset($_POST['pass']) && $_POST['user'] != "" && $_POST['pass'] != "") {
        $username = $_POST["user"];
        $password = $_POST["pass"];

        // Checks if the username and password are correct
        if ($username == "Saly" && $password == "No") {
            // Sets session variables for the logged-in user
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;

            header("location:index.php");
            exit();
        } else {
            echo "Incorrect username or password";
        }

        if (isset($_SESSION['user'])) {
            header("location:index.php");
            exit();
        }
    }
    ?>
</body>

</html>
