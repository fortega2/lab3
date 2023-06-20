<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 04 - Variables Objeto</title>
    <style>
        .rojo {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Variables de tipo objeto en php. Objeto renglon de pedido</h1>
    <?php
        $objRenglonPedido = new stdClass();
        $objRenglonPedido->codigoArticulo = "cp001";
        $objRenglonPedido->descArticulo = "Lavarropas";
        $objRenglonPedido->precioUnitario = 85674;
        $objRenglonPedido->cantidad = 90;

        echo "<h2><span class='rojo'>\$objRenglonPedido</span></h2>";

        echo "<p>Código de artículo: " . $objRenglonPedido->codigoArticulo . "</p>";
        echo "<p>Descripción del artículo: " . $objRenglonPedido->descArticulo . "</p>";
        echo "<p>Precio unitario: " . $objRenglonPedido->precioUnitario . "</p>";
        echo "<p>Cantidad: " . $objRenglonPedido->cantidad . "</p>";

        echo "<h2>Tipo de <span class='rojo'>\$objRenglonPedido</span>: " , gettype($objRenglonPedido) , "</h2>";

        $renglonesPedido = [$objRenglonPedido, $objRenglonPedido];
        
        echo "<h1>Tabula <span class='rojo'>\$renglonesPedido</span>. Recorrer el arreglo de renglos y tabularlos con html:</h2>";

        foreach ($renglonesPedido as $objRenglonPed) {
            echo "<p>";
            echo $objRenglonPed->codigoArticulo , "&nbsp";
            echo $objRenglonPed->descArticulo , "&nbsp";
            echo $objRenglonPed->precioUnitario , "&nbsp";
            echo $objRenglonPed->cantidad , "&nbsp";
            echo "</p>";
        }

        echo "<h2>Cantidad de renglos " , count($renglonesPedido);

        $objRenglonPedido = new stdClass();
        $objRenglonPedido->renglonesPedido = $renglonesPedido;
        $objRenglonPedido->cantidadDeRenglones = count($renglonesPedido);

        $jsonRenglonesPedido = json_encode($objRenglonPedido);

        echo "<h1>Producción de un objeto <span class='rojo'>\$objRenglonPedido</span> con dos atributos: array renglonesPedido y cantidadDeRenglones</h1>";

        echo "<p>Cantida de renglones: " , $objRenglonPedido->cantidadDeRenglones , "</p>";

        echo "<h1>Producción de un JSON jsonRenglones:</h1>";
        echo $jsonRenglonesPedido;
    ?>
</body>
</html>