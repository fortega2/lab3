<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Sesión</title>
</head>
<?php
    session_start();
    require("./autentica.inc.php");
    
    $log = $_POST["usuario"];
    $contra = $_POST["contra"];

    if (!autentica($log, $contra)) {
        header("location:./formularioIngreso.html");
        exit();
    } else {
        if (!isset($_SESSION["idSesion"])) {        
            $_SESSION["idSesion"] = session_create_id();
            $_SESSION["login"] = $log;
            $_SESSION["ingresos"] = sumarIngresoSesion($log);
            $_SESSION["fechaIngreso"] = date("d-m-Y h:i:s");
            $_SESSION["pais"] = "Argentina";
        }

        echo "
            <h1>Acceso Permitido al Sistema</h1>
            <h2>Los parámetro de su sesión son los siguientes:</h2>
            <h3>ID de sesión: " . $_SESSION["idSesion"] . "</h3>
            <h3>Ingresos al sistema: " . $_SESSION["ingresos"] . "</h3>
            <h3>Usuario: " . $_SESSION["login"] . "</h3>
            <h3>Ingreso de la sesión: " . $_SESSION["fechaIngreso"] . "</h3>
            <h3>País de logueo: " . $_SESSION["pais"] . "</h3>
        ";

        echo "<p><button onClick=\"location.href='../ABM'\">Ingrese a la aplicación</button></p>";
        echo "<p><button onClick=\"location.href='./destruirSesion.php'\">Cerrar sesión</button></p>";
    }
?>