<?php
    $servername = "studentmysql.miun.se";
    $username = "saal2107";
    $password = "3a5fci0y";
    $dbname = "saal2107";
    
    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    

?>