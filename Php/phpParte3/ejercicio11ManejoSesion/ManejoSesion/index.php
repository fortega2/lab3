<?php
    session_start();
    if (!isset($_SESSION["idSesion"])) {
        header("location:./formularioIngreso.html");
        exit();
    }
?>
<?php
    header("location:../ABM/index.php");
?>