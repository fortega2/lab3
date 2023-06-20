<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 03 - Variables de Servidor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            width: 100%;
        }
        
        body {
            height: 100%;
            width: 100%;
            margin: 0.5rem;
        }

        table {
            table-layout: fixed;
            border-collapse: collapse;
            background-color: #E9EED2;
            margin: 1.2em 0
        }

        td {
            border: 1px solid black;
            padding: 0.2rem;
        }
    </style>
</head>
<body>
    <h1>Variables de servidor</h1>
    <?php
        echo 
            "<table>"
                .
                "<tr>"
                    .
                    "<td>SERVER_ADDR</td>"
                    .
                    "<td>" . $_SERVER['SERVER_ADDR'] . "</td>"
                    .
                "</tr>"
                .
                "<tr>"
                    .
                    "<td>SERVER_PORT</td>"
                    .
                    "<td>" . $_SERVER['SERVER_PORT'] . "</td>"
                    .
                "</tr>"
                .
                "<tr>"
                    .
                    "<td>SERVER_NAME</td>"
                    .
                    "<td>" . $_SERVER['SERVER_NAME'] . "</td>"
                    .
                "</tr>"
                .
                "<tr>"
                    .
                    "<td>DOCUMENT_ROOT</td>"
                    .
                    "<td>" . $_SERVER['DOCUMENT_ROOT'] . "</td>"
                    .
                "</tr>"
                .
            "</table>"
        ;
    ?>
    <h1>Variables de cliente</h1>
    <?php
        echo 
            "<table>"
                .
                "<tr>"
                    .
                    "<td>REMOTE_ADDR</td>"
                    .
                    "<td>" . $_SERVER['REMOTE_ADDR'] . "</td>"
                    .
                "</tr>"
                .
                "<tr>"
                    .
                    "<td>REMOTE_PORT</td>"
                    .
                    "<td>" . $_SERVER['REMOTE_PORT'] . "</td>"
                    .
                "</tr>"
               .
            "</table>"
        ;
    ?>
    <h1>Variables de requerimiento</h1>
    <?php
        echo 
            "<table>"
                .
                "<tr>"
                    .
                    "<td>SCRIPT_NAME</td>"
                    .
                    "<td>" . $_SERVER['SCRIPT_NAME'] . "</td>"
                    .
                "</tr>"
                .
                "<tr>"
                    .
                    "<td>REQUEST_METHOD</td>"
                    .
                    "<td>" . $_SERVER['REQUEST_METHOD'] . "</td>"
                    .
                "</tr>"
                .
            "</table>"
        ;
    ?>
    <h1 style='margin-bottom: 0.2em'>TODAS</h1>
    <?php
        foreach ($_SERVER as $key => $value) {
            echo "<h2>" . $_SERVER[$key] . "</h2>";
        }
    ?>
</body>
</html>