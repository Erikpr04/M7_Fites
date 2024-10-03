<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hundir la flota tablero</title>
    <style>
        table {
            width: 500px; /* Aumentar el tamaño general de la tabla */
            height: 500px; /* Mantener la tabla cuadrada */
            border-collapse: collapse; /* Quitar los espacios entre las celdas */
            margin: 20px auto; /* Centrar la tabla en la página */
        }
        td {
            border: 2px solid black; /* Bordes más gruesos para mayor visibilidad */
            padding: 10px; /* Espacio dentro de las celdas */
            text-align: center; /* Centrar el contenido de las celdas */
            background-color: lightblue; /* Relleno azul claro para todas las celdas */
            font-size: 20px; /* Tamaño de fuente más grande */
        }
        td.X {
            background-color: darkblue; /* Color de fondo para las celdas del barco */
            color: white; /* Texto blanco para la "X" */
            font-weight: bold; /* Negrita para las celdas con barcos */
        }
        th {
            background-color: #e0e0e0; /* Color de fondo para las cabeceras */
            font-size: 18px;
            padding: 10px;
        }
    </style>
</head>


<body>
    <?php
    $ships_to_generate = 0;
    $generate_table = false;

    if (isset($_GET['ships'])) {
        $ships_to_generate = (int)$_GET['ships'];
    
        if ($ships_to_generate > 10) {
            $ships_to_generate = 10; //CAMBIAR YA
            $error_message = "Error: No puedes generar más de 4 barcos.";
        } else {
            $generate_table = true; 
        }
    }
    ?>
    <form action="" method="get">
        <label for="ships">¿Cuántos barcos quieres generar?</label>
        <input type="number" id="ships" name="ships" min="1" required>
        <input type="submit" value="Generar">
    </form>
    <p>Número de barcos a generar: <?php echo $ships_to_generate; ?></p>


    <?php
// Mostrar mensaje de error si se excede el límite
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}

// Aquí iría el código para generar los barcos y la tabla si $generate_table es true
if ($generate_table) {
    // Código para generar el tablero y los barcos
    echo "<p>Generando $ships_to_generate barcos...</p>";
}
?>

    <?php
            $x = 10;  
            $y = 10;  

            function generar_barcos($ships_to_generate, $grid_size) {

                $main_ships_array = [];
                $occupied_positions = [];
                $ship_types = [1,2,3,4];
            
                for ($n = 1; $n <= $ships_to_generate; $n++) {
                    $barco_valido = false;
            
                    // Intentamos generar un barco hasta que sea válido
                    while (!$barco_valido) {
                        $longitud_barco = shuffle($ship_types);

                        unset($ship_types[$longitud_barco]);
                        $direccion = rand(0, 1); // 0: horizontal, 1: vertical
            
                        if ($direccion == 0) { // Horizontal
                            $x_inicial = rand(0, $grid_size - $longitud_barco);
                            $y_inicial = rand(0, $grid_size - 1);
                            $coordenadas_x = range($x_inicial, $x_inicial + $longitud_barco - 1);
                            $coordenadas_y = array_fill(0, $longitud_barco, $y_inicial);
                        } else { // Vertical
                            $x_inicial = rand(0, $grid_size - 1);
                            $y_inicial = rand(0, $grid_size - $longitud_barco);
                            $coordenadas_x = array_fill(0, $longitud_barco, $x_inicial);
                            $coordenadas_y = range($y_inicial, $y_inicial + $longitud_barco - 1);
                        }
            
                        // Comprobamos si las coordenadas del barco no están ocupadas
                        $barco_valido = true;
                        for ($i = 0; $i < $longitud_barco; $i++) {
                            $posicion = $coordenadas_x[$i] . "," . $coordenadas_y[$i];
                            if (in_array($posicion, $occupied_positions)) {
                                $barco_valido = false;
                                break;
                            }
                        }
            
                        // Si el barco es válido, lo añadimos
                        if ($barco_valido) {
                            $nombre_barco = "barco_$n";
                            $main_ships_array[$nombre_barco] = ['x' => $coordenadas_x, 'y' => $coordenadas_y];
            
                            // Marcamos las posiciones como ocupadas
                            for ($i = 0; $i < $longitud_barco; $i++) {
                                $posicion = $coordenadas_x[$i] . "," . $coordenadas_y[$i];
                                $occupied_positions[] = $posicion;
                            }
                        }
                    }
                }
            
                return $main_ships_array;
            }
            
            $grid_size = 10; 
            $main_ships_array = generar_barcos($ships_to_generate, $grid_size);
            


            ?>




    <?php if ($generate_table): ?>


    <table style="border: 1px solid black; border-collapse: collapse;padding: 5px; ">

    <?php
        

            echo "<tr><td style='border: 1px solid black; border-collapse: collapse;'></td>";  
            for ($i = 1; $i <= $x; $i++) {
                echo "<td style='border: 1px solid black; border-collapse: collapse;'> $i </td>";
            }
            echo "</tr>";


            $ship_colors = []; 

            // Asignamos un color aleatorio a cada barco
            foreach ($main_ships_array as $nombre => $coordenadas) {
                $ship_colors[$nombre] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            }

            for ($e = 0; $e < $y; $e++) {
                echo "<tr>";
                $letter = chr(65 + $e); 
                echo "<tr><td style='border: 1px solid black; border-collapse: collapse;'> $letter </td>";  
            
                for ($i = 0; $i < $x; $i++) {
                    $hay_barco = false;
                    $color_barco = ''; // Variable para almacenar el color del barco encontrado
            
                    foreach ($main_ships_array as $nombre => $coordenadas) {
                        if (in_array($i, $coordenadas['x']) && in_array($e, $coordenadas['y'])) {
                            $hay_barco = true;
                            $color_barco = $ship_colors[$nombre]; // Usar el color asignado a ese barco
                            break; // Salir del bucle si se encuentra un barco
                        }
                    }
            
                    if ($hay_barco) {
                        echo "<td style='border: 1px solid black; background-color: $color_barco;'></td>";
                    } else {
                        echo "<td style='border: 1px solid black;'></td>";
                    }
                }
            
                echo "</tr>";
            }
            
        ?>
    </table>

    <?php endif; ?>

</body>
</html>
