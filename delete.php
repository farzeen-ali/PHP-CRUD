<?php
    include 'db_connection.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        if($conn->query($sql) === TRUE){
            header('Location: read.php');
        }else{
            echo "Error Deleting Data: ".$conn->error;
        }
    }
    $conn->close();

?>