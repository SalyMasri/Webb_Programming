<?php
function send_info($conn){
    if(isset($_POST['add'])){
        session_start();
        $input_string="yes";
        $id = md5($input_string); 
        $username = $_POST["username"];
        $message = $_POST['message'];
        $Date = $_POST['Date'];
        
        try {
            $stmt = $conn->prepare("INSERT INTO mestab (id, username, message, Date)
                                    VALUES (:id, :username, :message, :Date)");
            $stmt->bindParam(':id', $id); //bind value
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':Date', $Date);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
function get_info($conn){
    try {
        if ($conn !== null) {
            $stmt = $conn->prepare("SELECT * FROM mestab"); //takes an SQL query string as its parameter and returns a PDOStatement object.
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $rader) {
                $id = $rader['id'];
                $sql_insert = "SELECT * FROM mestab WHERE id = '$id';";

                $ny_resultat = $conn -> query($sql_insert);
                if($rader = $ny_resultat-> fetch(PDO::FETCH_ASSOC))//returns the row as an array or object
                {
                    echo $rader['message']."<br><br>";
                    echo "Skriven av: ".$rader['username']."<br>";
                    echo "Datum: ".$rader['Date']."<br>";

                    echo "<form method='POST' action='#".delete_info($conn)."'> 
                    <input type='hidden' name='id' value='".$rader['id']."'>
                    <button name='delete'>delete</button><br><hr> 
                    </form>"; 
                     
                }
            }
        } else {
            echo "Error: Connection is null";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


function delete_info($conn){
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        try {
            $stmt = $conn->prepare("DELETE FROM mestab WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("Location:test.php");
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
        
            
echo '<div class="left-column">
<form method="post">
    <ul class="entry">
        <li>
            <input type="text" name="username" placeholder="username" >
        </li>
        <li class="message">
            <textarea type="text" name="message" placeholder="message"></textarea>
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
?> 
