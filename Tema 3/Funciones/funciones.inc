<?php

/* archivo con las fucniones y luego en cada archivo que este la funcion 
 añades el enlace de este archivo y asi cuando se llamen a las funciones, se acude a este archivo y las utiliza*/

 


function saludo($n)
{
    echo "Hola," . $n;
}





function cuenta($a, $b)
{
    for ($i = $a; $i <= $b; $i++) {
        echo $i;

        if ($i < $b) {
            echo ",";
        }
    }
}



function intercambia(&$a, &$b)
{
    $antesA = $a;
    $antesB = $b;

    $temp = $a;
    $a = $b;
    $b = $temp;

     echo "<p> El valor de A era " . $antesA . " y ahora es " . $a . " y el valor de B era " . $antesB . " y ahora es " . $b . "</p>";

  
}



?>
