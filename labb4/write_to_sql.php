<?php
    include("database.php");
    include("functions.php");

    send_info($conn);
    delete_info($conn);

    
    get_info($conn);

    echo '</ul> 
    </div>';
?>

