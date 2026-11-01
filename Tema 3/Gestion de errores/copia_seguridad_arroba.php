<?php
$fichero = @file_get_contents("aa.txt");

if ($fichero === false) {
    echo "No se ha podido leer el archivo";
} else {
    file_put_contents("copia_datos.txt", $fichero);
}
