<?php 

  session_start();
  if($_SESSION['status'] != true){
    header("header:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="sty.css" type="text/css">
    <title>Del 2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <ul>
    
    <li><a href="Del2.php"> Del2</a></li>
    <li><a href="login.php">profile</a></li>

    <li> <a href="logout.php">logout</a></li>
</ul>

<h1> Do you have previous experience developing with PHP? </h1>
<h3> No, I thought it was an animal at first</h3>

<h1> How have you chosen to structure your files and directories? </h1>
<h3> simple with some colours  </h3>

<h1> Did you follow the guide, or create on your own? </h1>
<h3> The guide is our guide </h3>

<h1> Have you made any improvements or further developments to the guide (if you followed it)? </h1>
<h3> Not really </h3>

<h1>Which development environment have you used for the task (Editor, web server, etc.)?</h1>
<h3> Visual studio + XAMPP </h3>

<h1>Has anything been difficult with this task?</h1>    
<h3> As I followed the guide, it was easy  </h3>


</body>
</html>

