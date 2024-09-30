<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'db_connection.php';

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        if(!empty($username) && !empty($email) && !empty($password)){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if($conn->query($sql) === TRUE){
                echo "Record Created Successfully";
            }else{
                echo "Error " . $sql ."<br>" . $conn->error;
            }
            $conn -> close();
        }
        else {
            echo "All Fields are Required";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Users</title>
</head>
<body>
    <h1>Create Users Data</h1>
    <form action="create.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Create">
    </form>
</body>
</html>
