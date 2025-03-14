<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit();
}

$page_title = "Start Page";
include("include/Ques.php");
?>
