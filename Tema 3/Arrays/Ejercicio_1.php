<?php

$multiplicar = [];
//crear array vacio

//rellenar el array
for ($i = 0; $i <= 9; $i++) // numero de la tabla 
{
    for ($j = 1; $j <= 10; $j++) //numero por el que lo multiplica
    {
        $multiplicar[$i][$j] = $i * $j;
    }
}

//recorrer y mostrar
for ($i = 0; $i <= 9; $i++) {
    echo "tabla del " . $i . "<br>";

    for ($j = 1; $j <= 10; $j++) {
        echo $i . " x " . $j . "=" . $multiplicar[$i][$j] . "<br>";
    }
}



?>
/* se podria hacer todo en un solo bucle doble, rellenar y mostrar
pero el enunciado pide crear array y despues mostrar*/