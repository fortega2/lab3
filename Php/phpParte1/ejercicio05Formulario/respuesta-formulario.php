<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta del formulario</title>
</head>
<body>
    <?php 
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];

        echo "<p>Valores pasados:</p>";
        echo "<p>Nombre = " , $nombre , "</p>";
        echo "<p>Apellido = " , $apellido , "</p>";
    ?>
    <button>
        <a href="../../index.html">Cerrar</a>
    </button>
</body>
</html>