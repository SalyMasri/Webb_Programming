
<?php
session_start();


if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$page_title = "Question Page"; 
include("include/Ques.php");
 ?>
