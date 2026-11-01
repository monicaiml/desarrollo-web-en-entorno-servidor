<?php
$radio = 3.5;
define("PI", 3.1415);
$area = PI * pow($radio, 2);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    echo "<p> El área del círculo es " . number_format($area, 2) . ", donde " . number_format($area, 2) . " será el resultado de calcular el área" . "</p>";
    ?>

</body>

</html>