<?php

$texto = "20:30:14";
$texto1 = preg_split("/[:]/", $texto);
$hora = $texto1[0];
$minuto = $texto1[1];
$segundo = $texto1[2];

if (preg_match("/(^[0-1][0-9]|2[0-3]$)/", $hora) && (preg_match("/^[0-5][0-9]$/", $minuto)) && (preg_match("/^[0-5][0-9]$/", $segundo))) {
    echo "hora valida";
} else {
    echo "hora no valida";
}
