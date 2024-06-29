<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","fashify");
    if (!$conn) {
        echo "Sikertelen csatlakozás";    
    }    

?>