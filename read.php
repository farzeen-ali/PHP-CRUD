<?php
    include 'db_connection.php';
    $sql = "SELECT * FROM users";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
</head>
<body>
    <h2>Users List</h2>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($result->num_rows > 0){
                while($row=$result-> fetch_assoc()){
                    echo "
                      <tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["username"]."</td>
                        <td>".$row["email"]."</td>
                        <td><a href='update.php?id=".$row["id"]."'>Edit</a></td>
                         <td><a href='delete.php?id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this data\")'>Delete</a></td>
                      </tr>  
                    ";
                };
            }
            else{
                echo "<tr>
                    <td>No Records Found</td>
                </tr>";
            }
            $conn->close();
        
        ?>
        </tbody>
    </table>
</body>
</html>
