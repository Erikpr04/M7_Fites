<!--exercici3!-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex3</title>
</head>
<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <?php
            $x = 10;
            $y = 10;
            $i = 0;

                for($e = 0; $e <= $y; $e++) {
                    ?>
                    <tr>
                    <?php

                    $i = $e;
                    

                    for($i; $i <= $x; $i++) {

                    echo "<td style='border: 1px solid black; border-collapse: collapse;'> $i </td>";

                    }
                    $x+=1;


                    ?>
                    </tr>
                    
                    <?php

                }
                ?>
                

    </table>
    
</body>

</html>