<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex6.1</title>
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



        if (isset($_POST)) {


        }


 		$conn = mysqli_connect('localhost','admin','admin123');
 
 		mysqli_select_db($conn, 'mundo');
 
        $consulta = "SELECT Name FROM country ORDER BY Name ASC;";
 		$resultat = mysqli_query($conn, $consulta);
 

 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
        echo "\t<form action='ex6_1.php' method='POST'>\n";

        echo "\t\t<select name='country_name'>\n";
        while( $registre = mysqli_fetch_assoc($resultat) ){
            echo "\t\t<option>" . $registre["Name"] . "</option>\n";
        }
        echo "\t\t</select>\n";

        echo"<br>\n";
        echo "\t\t<h3>Is official</h3>\n";
        echo "\t\t<input type='radio' name='isOfficial' value='True'>\n";
        echo "\t\t<label for='isOfficial_true'>True</label><br>\n";
        echo "\t\t<input type='radio' name='isOfficial' value='False'>\n";
        echo "\t\t<label for='isOfficial_false'>False</label><br>\n";

        
        
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