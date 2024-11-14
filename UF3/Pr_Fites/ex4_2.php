<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex4_2</title>
	<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background-color: #f5f7fa;
        font-family: Arial, sans-serif;
    }

    .tables-container {
        display: -webkit-box;
        gap: 20px;
        justify-content: center;
        max-width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    table {
        width: 300px;
        min-width: 250px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        border-collapse: collapse; 
    }

    th, td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ddd;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    @media (max-width: 768px) {
        .tables-container {
            flex-direction: column; 
            align-items: center;
        }
        table {
            width: 90%; 
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
		 echo "\t<form action='ex4_2.php' method='POST'>\n";

		 while( $registre = mysqli_fetch_assoc($resultat) ){
			 echo "\t\t<input type='checkbox' name='continents[]' value='".$registre["Continent"]."'>".$registre["Continent"]."\n"; 
		 }
		 echo "\t\t<input type='submit'>\n";
		 
		 echo "\t</form>\n";
    
 	?>






<?php
if (isset($_POST["continents"])) {
    if (!isset($_SESSION["continents"])) {
        $_SESSION["continents"] = array();
    }
    $_SESSION["continents"] = $_POST["continents"]; // update the session variable with the new array

	echo "<div class='tables-container'>";
    foreach($_SESSION["continents"] as $continent_selected) {
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
		echo "\t<th>$continent_selected</th>\n";


        while( $registre = mysqli_fetch_assoc($resultat) ){
            echo "\t<tr>\n";
            echo "\t\t<td>".$registre["Name"]."</td>\n";
            echo "\t</tr>\n";
        }
		echo "</table>\n";

    }
	echo "</div>";
}else{
	echo "No s'ha seleccionat cap continent";
}

 	?>

</body>
</html>