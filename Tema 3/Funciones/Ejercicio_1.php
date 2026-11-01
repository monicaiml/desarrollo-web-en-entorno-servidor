

<?php


function saludo($n)
{
    echo "Hola," . $n;
}
saludo("Isa");


echo "<br> <br>";

function cuenta($a, $b)
{
    for ($i = $a; $i <= $b; $i++) {
        echo $i;

        if ($i < $b) {
            echo ",";
        }
    }
}
cuenta(10, 20);

echo "<br><br>";


function intercambia(&$a, &$b)
{
    $antesA = $a;
    $antesB = $b;

    $temp = $a;
    $a = $b;
    $b = $temp;

    //una vez hecho el intercambio, los valores ya son los nuevos, por eso guardo los valores anteriores en variables
    echo "<p> El valor de A era " . $antesA . " y ahora es " . $a . " y el valor de B era " . $antesB . " y ahora es " . $b . "</p>";
}
//cuando utilizas parámetros por referencia, debes pasar variables a la función, no valores directamente.
$num1 = 2;
$num2 = 9;
intercambia($num1, $num2);

/*al poner en el enunciado referencia, se ñade a los parametros &. Eso hace que los valores de las
variables cambien de forma permanente sus valores originales y mantengan sus nuevos valores incluso fuera de 
la funcion. Sin & los nuevos valores solo existirian dentro de la funcion.*/
?>
