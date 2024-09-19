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
        <tr>
            <?php
            $var = 10;

                for($i = 0; $i <= $var; $i++){

                    $var1 = chr(65+ $i);

                    echo "<td style='border: 1px solid black; border-collapse: collapse;'> $var1 </td>";

                }
                ?>
                <tr>
                <?php
                for($i = 0; $i <= $var; $i++){


                    echo "<td style='border: 1px solid black; border-collapse: collapse;'> $i </td>";

                }
                ?>
                </tr>
            

        </tr>

    </table>
    
</body>




    
</body>
</html>