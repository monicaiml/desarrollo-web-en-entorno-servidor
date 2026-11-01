<?php

$radio = 5.4;
define("PI", 3.1416);
$area = PI * pow($radio, 2);
$textoResultado = "El área calculada del circulo es " . number_format($area, 2);
echo $textoResultado . "<br>";
$textoResultadoMayus = strtoupper($textoResultado);
echo $textoResultadoMayus . "<br>";

$textoResultadoModificado = str_replace("calculada", "obtenida", $textoResultado);
echo $textoResultadoModificado . "<br>";

echo strlen($textoResultadoModificado) . "<br>";

$posicion = strpos($textoResultado, "circulo");
echo $posicion . "<br>";

$numeros = "1,2,3,4,5";
$array = explode(",", $numeros);
$suma = 0;
for ($i = 0; $i < count($array); $i++) {
    echo $array[$i];
    if ($i < count($array) - 1) {
        echo "+";
    }
    $suma += $array[$i];
}
echo "=" . $suma . "<br>";
