<?php
    function autentica($log, $contra) {
        $resultado;
        $claveEncriptada = sha1($contra);

        $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
        $dbname = "b5oonaccrh45cpi3gevs";
        $user = "ugjhggs4vvwnlhjj";
        $password = "QlXtbUgOrjZTNoFZ1VNm";

        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            $respuesta_estado = "\nConexion exitosa";
        } catch (PDOExcepction $ex) {
            $respuesta_estado = $ex->getMessage();
        }

        $sql = "SELECT clave FROM login_usuario WHERE usuario = :usuario AND clave = :clave";

        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(":usuario", $log);
        $stmt->bindParam(":clave", $claveEncriptada);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $aux = $stmt->fetch();

        if (empty($aux)) {
            $resultado = false;
            return $resultado;
        }

        $claveBaseDeDatos = implode(" ", $aux);

        if ($claveEncriptada == $claveBaseDeDatos) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    function sumarIngresoSesion($log) {
        $host = "b5oonaccrh45cpi3gevs-mysql.services.clever-cloud.com";
        $dbname = "b5oonaccrh45cpi3gevs";
        $user = "ugjhggs4vvwnlhjj";
        $password = "QlXtbUgOrjZTNoFZ1VNm";

        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            $respuesta_estado = "\nConexion exitosa";
        } catch (PDOExcepction $ex) {
            $respuesta_estado = $ex->getMessage();
        }

        $sql = "SELECT ingresos FROM login_usuario WHERE usuario = :usuario";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":usuario", $log);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $aux = $stmt->fetch();

        $ingresos = implode(" ", $aux);
        $ingresos++;

        $sql = "UPDATE `login_usuario` SET ingresos = :ingresos WHERE usuario = :usuario";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(":ingresos", $ingresos);
        $stmt->bindParam(":usuario", $log);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $aux = $stmt->fetch();

        return $ingresos;
    }
?>