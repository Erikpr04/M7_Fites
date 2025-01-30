<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>


<?php
    if (isset($_POST["user"]) && isset($_POST["pass"])) {
        $hostname = "localhost";
        $dbname = "users";
        $username = "admin";
        $pw = "admin123";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
 
        $password = $_POST["pass"];
        $consulta = "INSERT INTO users (name, password) VALUES (:name, SHA2(:password, 512))";

        $stmt = $pdo->prepare($consulta);

        $stmt->bindParam(':name', $_POST["user"]);
        $stmt->bindParam(':password', $_POST["pass"]);

        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Hubo un error al registrar al usuario.";
        }
    }



?>

<form method="POST">
    <label for="user">User:</label>
    <input type="text" name="user" id="user">
    <label for="pass">pass:</label>
    <input type="password" name="pass" id="pass">
    <input type="submit" name="submit" id="submit">
</form>
    
</body>
</html>