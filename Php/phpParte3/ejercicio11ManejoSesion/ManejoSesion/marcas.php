<?php
    include("./proteccionSesion.inc.php");
?>
<?php
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";
    $respuesta_estado = "";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $respuesta_estado = $respuesta_estado . "\nConexion exitosa";
    } catch (PDOExcepction $ex) {
        $respuesta_estado = $respuesta_estado . "\n" . $ex->getMessage();
    }

    $sql = "select * from marcas order by marca";
    $stmt = $dbh->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $marcas = [];

    while ($marca = $stmt->fetch()) {
        $obtMarcas = new stdClass();
        $obtMarcas->marca = $marca["marca"];
        array_push($marcas, $obtMarcas);
    }

    $objMarcas = new stdClass();
    $objMarcas->marcas = $marcas;

    $salidaJson = json_encode($objMarcas);

    $dbh = null;

    echo $salidaJson;
?>