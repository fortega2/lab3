<?php
    include("./proteccionSesion.inc.php");
?>
<?php 
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";
    $respuesta_estado = "";

    $id = $_GET["id"];

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $respuesta_estado = $respuesta_estado . "\nConexion exitosa";
    } catch (PDOExcepction $ex) {
        $respuesta_estado = $respuesta_estado . "\n" . $ex->getMessage();
    }

    $sql = "select * from camara_fotos where id = :id";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $camaras = [];

    while ($marca = $stmt->fetch()) {
        $objCamara = new stdClass();
        $objCamara->id = $marca["id"];
        $objCamara->marca = $marca["marca"];
        $objCamara->modelo = $marca["modelo"];
        $objCamara->fecha = $marca["fecha"];
        $objCamara->precio = $marca["precio"];
        array_push($camaras, $objCamara);
    }

    $objCamaras = new stdClass();
    $objCamaras->camaras = $camaras;

    $salidaJson = json_encode($objCamaras);

    $dbh = null;

    echo $salidaJson;
?>