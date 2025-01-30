<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex5.2</title>
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
        echo "\t<form action='ex5_2.php' method='POST'>\n";
		echo "\t\t<input type='text' name='language' id='language' value=''>\n";
        echo "\t\t<input type='submit'>\n";

        echo "\t</form>\n";
    
 	?>
 	</table>






<?php
if (isset($_POST["language"])) {
    	$language_selected = $_POST["language"];
		try {
			$hostname = "localhost";
			$dbname = "mundo";
			$username = "admin";
			$pw = "admin123";
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
		  } catch (PDOException $e) {
			echo "Failed to get DB handle: " . $e->getMessage() . "\n";
			exit;
		  } 
		$query = $pdo->prepare("SELECT city.Name, if(countrylanguage.IsOfficial = 'T', CONCAT( '[Official]',countrylanguage.Language), countrylanguage.Language) as Language, countrylanguage.Percentage          
				FROM city
		          JOIN country ON city.CountryCode = country.Code
		          JOIN countrylanguage ON city.CountryCode = countrylanguage.CountryCode          
				  WHERE countrylanguage.Language 
				  LIKE('%$language_selected%')          
				  ORDER BY city.Name ASC;"); 
		$query->execute();


            echo "<table>\n";
			echo "\t<tr>\n";
			echo "\t\t<td>Name</td>\n";
			echo "\t\t<td>Language</td>\n";
			echo "\t\t<td>Percentage</td>\n";
			echo "\t</tr>\n";

		$row = $query->fetch();


         while($row){
			echo "\t<tr>\n";
			echo "\t\t<td>".$row["Name"]."</td>\n";
			echo "\t\t<td>".$row["Language"]."</td>\n";
			echo "\t\t<td>".$row["Percentage"]."</td>\n";
			echo "\t</tr>\n";
			$row = $query->fetch();
            }
            echo "</table>\n";
			unset($pdo); 
			unset($query);
   }
 	?>

</body>
</html>