<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Contador</h1>

    <p> El primer bucle for muestra los numeros del 1 al 100 separados por comas. No aparece coma tras llegar al 100.</p>
    <p> El segundo bucle while muestra los numeros del 10 al 0 separados por guiones. No aparece guon tras llegar al 0.</p>

    <?php

    for ($i = 1; $i <= 100; $i++) {
        echo $i;

        if ($i < 100) {
            echo ",";
        }
    }

    echo " <br> <br>";

    $i = 10;
    while ($i >= 0) {
        echo $i;

        if ($i > 0) {
            echo "-";
        }

        $i--;
    }

    ?>

</body>

</html>