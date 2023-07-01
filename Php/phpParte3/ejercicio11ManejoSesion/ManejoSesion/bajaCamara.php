<?php
    include("./proteccionSesion.inc.php");
?>
<?php
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";

    $id = $_POST["id"];

    $respuesta_estado = "\nRespuesta del servidor el alta. Entradas recibidas en el req http";
    $respuesta_estado = $respuesta_estado . "\nID: $id";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $respuesta_estado = $respuesta_estado . "\nConexion exitosa";
    } catch (PDOExcepction $ex) {
        $respuesta_estado = $respuesta_estado . "\n" . $ex->getMessage();
    }

    $sql = "DELETE FROM camara_fotos WHERE id = :id";    
    
    $stmt = $dbh->prepare($sql);
    $respuesta_estado = $respuesta_estado . "\nLa preparacion del sql fue exitoso";

    $stmt->bindParam(":id", $id);
    $respuesta_estado = $respuesta_estado . "\nEl bindeo de los campos fue exitoso";
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa de la baja";

    $dbh = null;

    echo $respuesta_estado;
?>