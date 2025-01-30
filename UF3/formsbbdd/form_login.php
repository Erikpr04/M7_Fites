<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        input{
            display: block;
        }
    </style>
</head>
<body>




<form method="POST">
    <label for="user">User:</label>
    <input type="text" name="user" id="user">
    <label for="pass">Pass:</label>
    <input type="password" name="pass" id="pass">
    <input type="submit" name="submit" id="submit">
</form>

<?php
    if (isset($_POST["user"]) && isset($_POST["pass"])) {

        try {
            $hostname = "localhost";
            $dbname = "users";
            $username = "admin";
            $pw = "admin123";
            $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
          } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
          }
        $query = $pdo->prepare("SELECT * FROM users WHERE name = ? AND password = SHA2(?,512) ;");
        $query->bindParam(1, $_POST["user"]);
        $query->bindParam(2, $_POST["pass"]);
        $query->execute();	
        if ($query->fetch()) {
            echo "Login correcte";
        } else {
            echo "Login incorrecte";
        }
    }
?>
    
</body>
</html>