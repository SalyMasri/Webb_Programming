<?php 

  session_start();

$_SESSION['status'] = false;

if(isset($_POST["login"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    if($user=="saly" && $pass=="no"){
        $_SESSION['username'] = $user;
        $_SESSION['status'] = true;
        header("Location: Del1.php");
    }else{
        $_SESSION['status'] = false;
            echo "<br>";
            echo "try again!";
    }
}

?>

<!-- <?php
        // session_start();
        // $_SESSION['status'] = false;

        // // Get the valid username and password from the session variables
        // $valid_username = $_SESSION['valid_username'] ?? "Saly";
        // $valid_password = $_SESSION['valid_password'] ?? "NO";
        // echo "Username is $valid_username and Password is $valid_password";

        // if(isset($_POST['login'])){
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];
    
        //     if($username == $valid_username && $password == $valid_password){
        //         $_SESSION['use']=$username;
        //         $_SESSION['status'] = true;
    
        //         header("Location: Del1.php");
    
        //         exit();
        //     } else {
        //         $_SESSION['status'] = false;
        //         echo "<br>";
        //         echo "try again!";
        //     }
        // }
        ?> -->

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="sty.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="index.php"></script>
</head>
<body>
    <p style="font-size: 40px;">
    </p>

    <form action="index.php" method="post">
        <table>
            <tr>
                <td><p>Username:</p></td>
                <td><input type="text" name="username"></td>
            </tr>

            <tr>
                <td><p>Password:</p></td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td><input type="submit" name="login" value="Login"></td>
                <td></td>
            </tr>
        </table>
    </form>

    <br><br>
</body>
</html>
