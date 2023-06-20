<?php
    sleep(3);

    $objRespuesta = new stdClass();

    $objRespuesta->idUsuario = $_POST["idUsuario"];
    $objRespuesta->login = $_POST["login"];
    $objRespuesta->apellido = $_POST["apellido"];
    $objRespuesta->nombre = $_POST["nombres"];
    $objRespuesta->fechafaNacimiento = $_POST["fechaNacimiento"];

    $jsonRespuesta = json_encode($objRespuesta);

    echo $jsonRespuesta;
?>