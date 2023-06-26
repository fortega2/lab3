<?php
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";

    $idOriginal = $_POST["idOriginal"];
    $id = $_POST["id"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $fecha = $_POST["fecha"];
    $precio = $_POST["precio"];

    // $pdf = file_get_contents($_FILES['pdf']['tmp_name']);

    $respuesta_estado = "\nRespuesta del servidor la modificacion. Entradas recibidas en el req http";
    $respuesta_estado = $respuesta_estado . "\nID del registro: $idOriginal";
    $respuesta_estado = $respuesta_estado . "\nID: $id";
    $respuesta_estado = $respuesta_estado . "\nMarca: $marca";
    $respuesta_estado = $respuesta_estado . "\nModelo: $modelo";
    $respuesta_estado = $respuesta_estado . "\nFecha: $fecha";
    $respuesta_estado = $respuesta_estado . "\nPrecio: $precio";

    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
        $respuesta_estado = $respuesta_estado . "\nConexion exitosa";
    } catch (PDOExcepction $ex) {
        $respuesta_estado = $respuesta_estado . "\n" . $ex->getMessage();
    }

    $sql = "update camara_fotos set id = :id, marca = :marca, modelo = :modelo, fecha = :fecha, precio = :precio where id = :idOriginal";    
    
    $stmt = $dbh->prepare($sql);
    $respuesta_estado = $respuesta_estado . "\nLa preparacion del sql fue exitoso";

    $stmt->bindParam(':idOriginal', $idOriginal);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":marca", $marca);
    $stmt->bindParam(":modelo", $modelo);
    $stmt->bindParam(":fecha", $fecha);
    $stmt->bindParam(":precio", $precio);
    $respuesta_estado = $respuesta_estado . "\nEl bindeo de los campos fue exitoso";
    
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa de la modificacion";

    $dbh = null;

    echo $respuesta_estado;
?>