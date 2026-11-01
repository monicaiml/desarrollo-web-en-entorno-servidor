<?php

$nota1 = 7.0;
$nota2 = 8.1;
$nota3 = 5.8;

if (($nota1 >= $nota2) && ($nota1 >= $nota3)) {
    echo "la primera nota que es " . $nota1 . " es la mayor nota de las 3";
} elseif (($nota2 >= $nota1) && ($nota2 >= $nota3)) {
    echo "la segunda nota que es " . $nota2 . " es la mayor nota de las 3";
} else {
    echo "la tercera nota que es " . $nota3 . " es la mayor nota de las 3";
}
