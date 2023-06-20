<!DOCTYPE html>
<?php
    sleep(3);

    $entradaForm = $_POST["clave"];
    $claveEncriptadaMd5 = md5($entradaForm);
    $claveEncriptadaSha1 = sha1($claveEncriptadaMd5);

    echo "
        <h4>Clave: $entradaForm</h4>
        <h4>Clave encriptada en md5 (128 bits 0 16 pares hexadecimales):</h4>
        <h4>$claveEncriptadaMd5</h4>
        <h4>Clave encriptada en sha1 (160 bits 0 20 pares hexadecimales):</h4>
        <h4>$claveEncriptadaSha1</h4>
    ";
?>