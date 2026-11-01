<?php
$num1 = 3;
$num2 = 5;
$num3 = 8;
$num1 *= 4;

var_dump($num1); // 12
var_dump($num1 <= $num2); // F
var_dump($num3 > $num1 and $num3 > $num2); // F
var_dump($num3 > $num1 or $num3 > $num2); // T
var_dump($num1 > $num2 xor $num1 > $num3); // F
/*xor->Devuelve true (verdadero) cuando solo una de las dos condiciones es 
verdadera. Si las dos son iguales 
(ambas verdaderas o ambas falsas), devuelve false.*/

$num3--;
var_dump($num3); //7

$num3 += $num1;
var_dump($num3); //19
