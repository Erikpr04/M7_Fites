<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex3</title>
	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
</head>
<body>



 	<?php


 		$conn = mysqli_connect('localhost','admin','admin123');
 
 		mysqli_select_db($conn, 'mundo');
 
        $consulta = "SELECT Continent FROM country GROUP BY Continent ORDER BY Continent ASC;";
 		$resultat = mysqli_query($conn, $consulta);
 

 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
        echo "\t<form action='ex4.php' method='POST'>\n";

        echo "\t\t<select name='continents'>\n";
 		while( $registre = mysqli_fetch_assoc($resultat) ){

 			echo "\t\t<option>".$registre["Continent"]."</option>\n"; 
 		}
        echo "\t\t</select>\n";
        echo "\t\t<input type='submit'>\n";

        echo "\t</form>\n";
    
 	?>
 	</table>






<?php
if (isset($_POST["continents"])) {
    $continent_selected = $_POST["continents"];
 		$conn = mysqli_connect('localhost','admin','admin123');
 
 		mysqli_select_db($conn, 'mundo');
 
        $consulta = "SELECT Name FROM country WHERE Continent = '$continent_selected' ORDER BY Name ASC;";
 		$resultat = mysqli_query($conn, $consulta);
 

 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}

            echo "<table>\n";

         while( $registre = mysqli_fetch_assoc($resultat) ){
            echo "\t<tr>\n";
            echo "\t\t<td>".$registre["Name"]."</td>\n";
            echo "\t</tr>\n";
            }
            echo "</table>\n";
   }
 	?>

</body>
</html>