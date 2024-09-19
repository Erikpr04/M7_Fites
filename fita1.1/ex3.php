<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        <?php
            $x = 10;
            $y = 10;

                for($i = 0; $i <= $x; $i++) {
                    ?>
                    <tr>
                    <?php
                    for($i = 0; $i <= $y; $i++){
                        ?>
                        <td>
                        <?php
                        echo "<td style='border: 1px solid black; border-collapse: collapse;'> $x </td>";
                        ?>
                        </td>
                        <?php
                    }
                    ?>
                    </tr>

                    <?php
                }
                ?>

    </table>
    
</body>




    
</body>
</html>