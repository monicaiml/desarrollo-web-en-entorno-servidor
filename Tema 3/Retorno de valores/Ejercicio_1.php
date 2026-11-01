<?php

function calculaDescuento($precio, $descuento = 0)
{
    $descuentoAplicado = ($precio * $descuento) / 100;
    return $precioFinal = $precio - $descuentoAplicado;
}
$precioFinal1 = calculaDescuento(250, 10);
$precioFinal2 = calculaDescuento(85);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precio con Descuento</title>
</head>

<body>
    <?php
    echo "<p> El precio del primer producto es 250 euros y con el descuento del 10 y su
    precio final es " . $precioFinal1 . " euros </p>";
    echo "<p> El precio del segundo producto es 85 euros y sin descuento  su 
    precio final es " . $precioFinal2 . " euros </p>";
    ?>
</body>

</html>

/*si se tiene una variable dentro de un bloque php, puede utilizarse en un bloque php en el html
pero si se utiliza una funcion, solo las variables globales (fuera de la funcion) podran utilizarse
en el html*/