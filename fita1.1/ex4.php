<!--exercici4!-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex4</title>
</head>
<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <?php
            $x = 10;  
            $y = 10;  

            
            echo "<tr><td style='border: 1px solid black; border-collapse: collapse;'></td>";  
            for ($i = 1; $i <= $x; $i++) {
                echo "<td style='border: 1px solid black; border-collapse: collapse;'> $i </td>";
            }
            echo "</tr>";

            for ($e = 0; $e < $y; $e++) {
                echo "<tr>";
                $letter = chr(65 + $e); 
                echo "<tr><td style='border: 1px solid black; border-collapse: collapse;'> $letter </td>";  

                for ($i = 0; $i < $x; $i++) {
                    echo "<td style='border: 1px solid black; border-collapse: collapse;'></td>";  
                }

                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
