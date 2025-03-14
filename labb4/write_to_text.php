<?php
class Information {
    public $username = "";
    public $message = "";
    public $date = "";

    function __construct($username, $message, $date) {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }
 
}

$array = array();

if(isset($_POST['add']) && $_POST['username'] != "" && $_POST['message'] !=""){   
    $instance = new Information($_POST['username'], $_POST['message'], date("Y-m-d H:i:s"));     
    
    if(filesize("text.txt")){
        $array = unserialize(file_get_contents("text.txt")); // reads the content of the file and unserializes it into an array.        
        array_push($array, $instance); 
    }
    else{
        array_push($array, $instance);                
    }
    file_put_contents("text.txt", serialize($array)); //updated array is serialized and written back to the 'text.txt' file
    
    header('Location: index.php'); 
}

if(isset($_GET['delete'])){                        
    $array = unserialize(file_get_contents("text.txt"));         
    unset($array[$_GET['delete']]);     //removes the element at the index specified by the 'delete' parameter                     
    file_put_contents("text.txt", serialize($array));           
    header('Location: index.php');
}

echo '<div class="left-column">
    <form method="post">
        <ul class="entry">
            <li>
                <input type="text" name="username" >
            </li>
            <li class="message">
                <input type="text" name="message" >
            </li>
            <li class="date">
                <input type="datetime-local" name="Date" value="'.date('Y-m-d\TH:i:s').'">
            </li>
            <li class="button">
                <input type="submit" name="add" >
            </li>
        </ul>
    </form>
</div>
<div class="right-column"> 
    <ul class="box-list">';
                        
    if(filesize("text.txt")){    
        $array = unserialize(file_get_contents("text.txt"));

        foreach($array as $key => $value){ 
            echo "<li class='flat-box'>
                <div class='upper-text'>
                    <p class='lower-text'>username: " . $value->username . "<br> message: " . $value->message . "<br> date: " . $value->date . "</p>
                    <a href='index.php?delete=".$key."' class='button'>delete</a>
                </div>
            </li>";
        }
    }
    echo '</ul> 
    </div>';
?>
