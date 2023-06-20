<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 01 - Base</title>
    <style>
        .rojo {
            color: red;
        }

        table {
            border-collapse: collapse;
            background-color: lightblue;
        }

        td {
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <h2>Todo lo escrito fuera de las marcas php es entregado en la respueta http sin pasar por el procesador php</h2>
    <hr>
    <?php
        echo "<h2>Todo texto y/o html <span class='rojo'>entregado por el procesador php</span> usando la sentencia echo</h2>";
        echo "<hr>";
    ?>
    <?php
        $variable = "mivalor";
        echo "<h2>Sin usar concatenador <span class='rojo'>\$variable</span> : $variable</h2>"; 
        echo "<h2>Usando concatenador <span class='rojo'>\$variable</span> :" . $variable . "</h2>";
    ?>
    <?php
        define("VARIABLE_CONSTANTE", "mi valor constante");
        echo "<h2><span class='rojo'>VARIABLE_CONSTANTE</span> : " . VARIABLE_CONSTANTE . "</h2>";
        echo "<h2>Tipo de <span class='rojo'>VARIABLE_CONSTANTE</span> : " . gettype(VARIABLE_CONSTANTE) . "</h2>";
    ?>
    <?php
        $nombres = ["Lautaro", "Ezequiel"];
        echo "<h1>Arreglos</h1>";
        echo "<h2><span class='rojo'>\$nombres</span> : " . $nombres[0] . "</h2>";
        echo "<h2><span class='rojo'>\$nombres</span> : " . $nombres[1] . "</h2>";
        echo "<h2>Tipo de <span class='rojo'>\$nombres</span> : " . gettype($nombres) .  "</h2>";

        array_push($nombres, "Abril");
        array_push($nombres, "Sofia");

        echo "<h2>Se agregan por programa dos elementos nuevos</h2>";

        echo "<ul>";
        foreach ($nombres as $nombre) {
            echo "<li> <h3>" . $nombre . "</h3> </li>";
        } 
        echo "</ul>";
    ?>
    <?php
        $diccionarioEspanol = ["Hola", "Adios", "Casa"]; 
        $diccionarioAnglosajon = ["Hello", "Good By", "House"];
        $diccionarioPortugues = ["Olá", "Adeus", "Casa"];
        $diccionarioFrances = ["Bonjour", "Adieu", "Maison"];

        $diccionario = [$diccionarioEspanol, $diccionarioAnglosajon, $diccionarioPortugues , $diccionarioFrances];

        echo "<h1>Arreglos de dos dimensiones (diccionario)</h1>";
        echo "<h2>La variable \$diccionario tiene el siguiente tipo : " . gettype($diccionario) . "</h2>";

        echo "<h2>Español Inglés Portugués Francés</h2>";
        echo "<table>";
        for ($i = 0; $i < count($diccionario) - 1; $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($diccionario); $j++) {
                echo "<td class='tabla'> <h2>" . $diccionario[$j][$i] . "</h2> </td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>También así se puede expresar el valor de \$diccionario[1][3] : " . $diccionario[3][1] . "</h2>";
        echo "<h2>Cantidad de elementos en diccionario: " . count($diccionario) . "</h2>";
    ?>
    <?php
        $articulos = [
            "codigoArticulo" => "c0001",
            "descripcionArticulo" => "Lavarropas",
            "precioUnitario" => 20,
            "cantidad" => 10,
        ];

        echo "<h1>Variables tipo arreglo asociativo</h1>";

        echo "<h2>Código de artículo: " . $articulos["codigoArticulo"] . "</h2>";
        echo "<h2>Descripción del artículo: " . $articulos["descripcionArticulo"] . "</h2>";
        echo "<h2>Precio unitario: " . $articulos["precioUnitario"] . "</h2>";
        echo "<h2>Cantidad de artículos: " . $articulos["cantidad"] . "</h2>";
        
        echo "<br>";

        echo "<h2>Cantidad de elementos en \$articulos:" .  count($articulos) . "</h2>";
        echo "<h2>Tipo de dato: " . gettype($articulos) . "</h2>";
    ?>
    <?php
        $x = 3;
        $y = 4;

        echo "<h1>Expresiones aritméticas</h1>"; 

        echo "<h2>La variable \$x = $x</h2>";
        echo "<h2>La variable \$y = $y</h2>";

        echo "<h2>Tipo de dato de \$x: " . gettype($x) . "</h2>";
        echo "<h2>Tipo de dato de \$y: " . gettype($y) . "</h2>";

        echo "<h2>Así se escribe una expresión aritmética, por ejemplo suma: (\$x + \$y) = " . $x + $y;
        echo "<h2>Así se escribe una expresión aritmética, por ejemplo resta: (\$x - \$y) = " . $x - $y;
        echo "<h2>Así se escribe una expresión aritmética, por ejemplo multiplicación: (\$x * \$y) = " . $x * $y;
        echo "<h2>Así se escribe una expresión aritmética, por ejemplo división: (\$x / \$y) = " . $x / $y;
    ?>
</body>
</html>