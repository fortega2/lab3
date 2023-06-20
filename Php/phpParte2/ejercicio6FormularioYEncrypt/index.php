<!DOCTYPE html>
<?php
    if (isset($_POST['input'])) {
        $entradaForm = $_POST["input"];
        $claveEncriptadaMd5 = md5($entradaForm);
        $claveEncriptadaSha1 = sha1($claveEncriptadaMd5);

        echo "
            <p>Clave: $entradaForm</p>
            <p>Clave encriptada en md5 (128 bits 0 16 pares hexadecimales):</p>
            <p>$claveEncriptadaMd5</p>
            <p>Clave encriptada en sha1 (160 bits 0 20 pares hexadecimales):</p>
            <p>$claveEncriptadaSha1</p>
        ";
    } else {
        ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>PHP 06 - Formulario y Encrypt</title>
                <style>
                    body, html {
                        height: 100%;
                        width: 100%;
                    }

                    .container {
                        width: 60%;
                        margin: auto;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <form action="" method="post">
                        <label for="input">Ingrese la clave a encriptar</label>
                        <input type="text" name="input" id="input">
                        <br>
                        <button type="submit">Obtener encriptación</button>
                    </form>
                </div>
            </body>
            </html>
        <?php
    }
?>