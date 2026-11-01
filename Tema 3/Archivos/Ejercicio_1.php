<?php
if (file_exists("datos.txt")) {
    $fichero = file_get_contents("datos.txt");
    file_put_contents("copia_datos.txt", $fichero);
} else {
    echo "el archivo no existe";
}
