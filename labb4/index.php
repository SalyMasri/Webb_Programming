<!DOCTYPE html>
<html lang="sv">
<head> 
    <meta charset="utf-8">
    
    <title> Labb4 </title>
    <style id="aby-style"></style>
        <link rel="stylesheet" href="WhatTO.css" type="text/css">

</head>
<body data-new-gr-c-s-check-loaded="14.1098.0" data-gr-ext-installed="">
<header> 
    <h1 class="header-title"> LABORATION 4 </h1>
    
    <ul class="nav">
    <li >
        <li>
            <form method="POST">
                <input type="hidden" name="text" value="text">
                <input type="submit" id="text" value="text">
            </form>
        </li> 
         <li>
            <form method="POST" action="test.php">
                <input type="submit" id="part2_btn" value="DEL 2">
            </form>
        </li> 
    </ul> 
</header>
<div class="content">
    <?php
        if (isset($_POST['text'])) {
            readfile('text.txt');
            exit;
        }
      
            require_once('write_to_text.php');
        
        
    ?>
</div>

</body>
</html>
