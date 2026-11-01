<?php
try {
    if (!file_exists("aa.txt")) {
        throw new Exception("El archivo no existe");
    }

    $fichero = file_get_contents("aa.txt");
    file_put_contents("copia_datos.txt", $fichero);
} catch (Exception $e) {
    echo $e->getMessage();
}

/*Con @:  el programa sigue ejecutándose. @ solo oculta el aviso.
Con die(): el programa se detiene justo cuando llega a die(). Las instrucciones posteriores no se ejecutan.
Con try/catch:después de capturar la excepción, el programa puede continuar con las instrucciones que haya
 después del bloque catch. */