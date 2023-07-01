<?php
    include("./proteccionSesion.inc.php");
?>
<?php
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";
    $respuesta_estado = "";

    $orden = $_GET["orden"];
    $id = $_GET["id"];
    $marca = $_GET["marca"];
    $modelo = $_GET["modelo"];
    $fecha = $_GET["fecha"];
    $precio = $_GET["precio"];

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $respuesta_estado = $respuesta_estado . "\nConexion exitosa";
    } catch (PDOExcepction $ex) {
        $respuesta_estado = $respuesta_estado . "\n" . $ex->getMessage();
    }

    $sql = "select * from camara_fotos ";
    $sql = $sql . "where id like CONCAT('%', :id, '%') ";
    $sql = $sql . "and marca like CONCAT('%', :marca, '%') ";
    $sql = $sql . "and modelo like CONCAT('%', :modelo, '%') ";
    $sql = $sql . "and fecha like CONCAT('%', :fecha, '%') ";
    $sql = $sql . "and precio like CONCAT('%', :precio, '%') ";
    $sql = $sql . "order by $orden";
    
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":modelo", $modelo);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":precio", $precio);
    
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