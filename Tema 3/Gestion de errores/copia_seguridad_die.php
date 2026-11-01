<?php
$fichero = file_get_contents("aa.txt");

if ($fichero === false) {
    die("No se ha podido leer el archivo");
}

file_put_contents("copia_datos.txt", $fichero);
