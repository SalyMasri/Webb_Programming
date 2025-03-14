
<?php 
session_start();
//Destroy the session and its set variables
if(session_destroy()){
    
    header("location: ../login.php");
}
?>