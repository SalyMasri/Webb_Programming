<?php 
  session_start();
  if(!isset($_SESSION['status']) || $_SESSION['status'] != true){
    header("header:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sty.css" type="text/css">
    <title>Del 3</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <ul>

    <li><a href="Del1.php">Del1</a></li>
      <li><a href="login.php">profile</a></li>

    <li> <a href="logout.php">logout</a></li>
  </ul>

<p style="font-size: 40px;"><?php echo "Datum / Klockslag :" .date("Y-m-d / G:i:a  ");
if(date('w') == 5){
    echo "Äntligen fredag!";
}?>

<br>

<p style="font-size: 40px;"><?php echo 'Din IP-adress : - '.$_SERVER['REMOTE_ADDR']; ?>

<br>

<p style="font-size: 40px;"><?php echo "Sökväg/filnamn :" .realpath('info.php');?>

<br>

<p style="font-size: 40px;"><?php

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true); 
?>
<br><br><br>


</body>
</html>


