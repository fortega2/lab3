<?php
    include("./proteccionSesion.inc.php");
?>
<?php
    session_destroy();
    header("location:./index.php");
?>