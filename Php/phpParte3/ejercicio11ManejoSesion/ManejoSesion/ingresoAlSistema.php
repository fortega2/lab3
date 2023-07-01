<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Sesión</title>
</head>
<?php
    include("./autentica.inc.php");
    
    $log = $_POST["usuario"];
    $contra = $_POST["contra"];

    if (!autentica($log, $contra)) {
        header("location:./formularioIngreso.html");
        exit();
    } else {
        session_start();
        $_SESSION["idSesion"] = session_create_id();
        $_SESSION["login"] = $log;
        $_SESSION["contador"] = $_SESSION["contador"] + 1;

        if (!isset($_SESSION["idSesion"])) {
            header("location:./index.php");
            exit();
        }

        echo "
            <h1>Acceso Permitido al Sistema</h1>
            <h2>Los parámetro de su sesión son los siguientes:</h2>
            <h3>ID de sesión: . " . $_SESSION["idSesion"] . "</h3>
            <h3>Usuario: . " . $_SESSION["login"] . "</h3>
            <h3>Contador de sesión: " . $_SESSION["contador"] . "</h3>
        ";

        echo "<p><button onClick=\"location.href='../ABM'\">Ingrese a la aplicación</button></p>";
        echo "<p><button onClick=\"location.href='./destruirSesion.php'\">Cerrar sesión</button></p>";
    }
?>