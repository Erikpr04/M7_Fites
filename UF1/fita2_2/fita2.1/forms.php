<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fita2 - ex1</title>
</head>
<body>

    <form method="POST">

        <label for="userName">User: </label>
        <input type="text" name="userName" placeholder="Pepe123"/>

        <label for="userPassword">Password: </label>
        <input type="password" name="userPassword"/>

        <input type="submit"/>

    </form>

    <?PHP

        $userDict = ["Pepe"=>"pepe1234", "Pepa"=>"pepa1234"];

        if(isset($_POST["userName"]) && isset($_POST["userPassword"])){

            // para hacerlo mÃ¡s legible
            $userName = $_POST["userName"];
            $userPassword = $_POST["userPassword"];

            if(array_key_exists( $userName, $userDict )){
               
                if( $userDict[$userName] == $userPassword){
                    echo("login correcte");
                }

                else{
                    echo("login incorrecte");
                }

            }

            else{
                echo("login incorrecte");
            }

        }


        

    ?>
    
</body>
</html>