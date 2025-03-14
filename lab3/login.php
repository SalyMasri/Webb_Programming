<?php 
  if($_SESSION['status'] != true){
    header("header:index.php");
  }
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Change username and password</title>
    <link rel="stylesheet" href="sty.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <h2>Change username and password</h2>

    <ul>
        <li><a href="Del1.php">Del1</a></li>
        <li><a href="Del2.php">Del2</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="#" method="post">
        <label for="newUsername">New Username:</label>
        <input id="newUsername" type="text" name="newUsername" required><br><br>
        <label for="newPassword">New Password:</label>
        <input id="newPassword" type="password" name="newPassword" required><br><br>
        <input type="submit" name="change" value="Change">
    </form>

    <?php
    session_start();

    // Check if user wants to change their username or password
    if(isset($_POST['change'])){
        $newUsername = $_POST['newUsername'];
        $newPassword = $_POST['newPassword'];

        // Update the session variables with the new values
        $_SESSION['user'] = $newUsername;
        $_SESSION['pass'] = $newPassword;

        echo "Your new username is $newUsername and your new password is $newPassword";
    }
    
    // Check if username is set
    if(isset($_POST['user']) && $_POST['user'] != ""){
        $username = $_POST["user"];
        $password = $_POST["pass"];

        // Check if the username and password are correct
        if($username == $_SESSION['user'] && $password == $_SESSION['pass']){
            // If they are, then the user is redirected to the index page
            header("location:index.php");
        } else {
            echo "Incorrect username or password";
        }
    }

    // If the session username is set, then the user is redirected to the index page
    if(isset($_SESSION['user'])){
        header("location:index.php");
    }
?>

</body>
</html>
