<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn -> connect_error){
        die("Connection Failed: " . $connect_error);
    }
?>