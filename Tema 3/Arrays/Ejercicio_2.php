<?php
$coches = [

    "124VFD" => ["Ford", "Focus", 5],
    "147IOP" => ["Seat", "Ibiza", 3],
    "720ZXS" => ["BMW", "X3", 3]
];

ksort($coches);

foreach ($coches as $matricula => $datos) {
    echo "Matricula: " . $matricula . "<br>";
    echo "Marca: " . $datos[0] . "<br>";
    echo "Modelo: " . $datos[1] . "<br>";
    echo "Puertas: " . $datos[2] . "<br>";
}
