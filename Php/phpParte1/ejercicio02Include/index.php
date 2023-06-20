<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 02 - Include</title>
    <style>
        table {
            table-layout: fixed;
            border: 2px solid black;
            /* border-collapse: collapse; */
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>En este ejemplo se utiliza la función include() que ubica código php definido en el archivo variables.inc</h1>
    <h1>Antes de insertar el include las variables declaradas en el mismo no existen <br> Las variables son:</h1>
    <?php 
        echo "<table>";
        echo 
            "<tr>"
                .
                "<td>" . $miVariable1["nombre"] . "</td>"
                .
                "<td>" . $miVariable1["apellido"] . "</td>"
                .
                "<td>" . $miVariable1["anoNacimiento"] . "</td>"
                .
            "</tr>"
            .
            "<tr>"
                .
                "<td>" . $miVariable2["nombre"] . "</td>"
                .
                "<td>" . $miVariable2["apellido"] . "</td>"
                .
                "<td>" . $miVariable2["anoNacimiento"] . "</td>"
                .
            "</tr>"
        ;
        echo "</table>";
        echo "<h2>La longitud de los arreglos es: 0</h2>";
    ?>
    <?php 
        include("./variables.inc.php");

        echo "<h2>Acá ya se ejecutó la función include(). Cuando se usa include ocurre que si el archivo .inc no existe, se visualiza un warning y el script sigue ejecutándose con normalidad</h2>";

        echo "<h2>Las 2 varibles dentro del archivo .inc son: </h2>";

        echo "<table>";
        echo 
            "<tr>"
                .
                "<td>" . $miVariable1["nombre"] . "</td>"
                .
                "<td>" . $miVariable1["apellido"] . "</td>"
                .
                "<td>" . $miVariable1["anoNacimiento"] . "</td>"
                .
            "</tr>"
            .
            "<tr>"
                .
                "<td>" . $miVariable2["nombre"] . "</td>"
                .
                "<td>" . $miVariable2["apellido"] . "</td>"
                .
                "<td>" . $miVariable2["anoNacimiento"] . "</td>"
                .
            "</tr>"
        ;
        echo "</table>";
        echo "<h2>La longitud de los arreglos es: " . count($miVariable1) . "</h2>";
    ?>
</body>
</html>