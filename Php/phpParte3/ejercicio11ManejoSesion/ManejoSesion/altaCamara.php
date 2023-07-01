<?php
    include("./proteccionSesion.inc.php");
?>
<?php
    $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
    $dbname = "b5oonaccrh45cpi3gevs";
    $user = "ugjhggs4vvwnlhjj";
    $password = "QlXtbUgOrjZTNoFZ1VNm";

    $id = $_POST["id"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $fecha = $_POST["fecha"];
    $precio = $_POST["precio"];

    $respuesta_estado = "\nRespuesta del servidor el alta. Entradas recibidas en el req http";
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

    if (empty($_FILES['pdf']['tmp_name'])) {
        $respuesta_estado = $respuesta_estado . "\nNo se ha seleccionado ningún file para enviar";
        
        $sql = "INSERT INTO camara_fotos(id, marca, modelo, fecha, precio, archivopdf) VALUES(:id, :marca, :modelo, :fecha, :precio, null)";    
    
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nLa preparacion del sql fue exitoso";

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":modelo", $modelo);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":precio", $precio);
        $respuesta_estado = $respuesta_estado . "\nEl bindeo de los campos fue exitoso";
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa del alta";
    } else {
        $respuesta_estado = $respuesta_estado . "\nTrae documento pdf asociado al id " . $id;

        $pdf = file_get_contents($_FILES['pdf']['tmp_name']);
        
        $sql = "INSERT INTO camara_fotos(id, marca, modelo, fecha, precio, archivopdf) VALUES(:id, :marca, :modelo, :fecha, :precio, :archivopdf)";
        $stmt = $dbh->prepare($sql);
        $respuesta_estado = $respuesta_estado . "\nLa preparacion del sql fue exitoso";

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":modelo", $modelo);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(':archivopdf', $pdf);
        $respuesta_estado = $respuesta_estado . "\nEl bindeo de los campos fue exitoso";

        $stmt->execute();
        $respuesta_estado = $respuesta_estado . "\nEjecucion exitosa del alta";
    }

    $dbh = null;

    echo $respuesta_estado;
?>