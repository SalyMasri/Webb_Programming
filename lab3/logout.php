<?php

    session_unset();
    session_destroy();  
    $_SESSION['status'] = false;
    header("location: index.php");
    
?>

