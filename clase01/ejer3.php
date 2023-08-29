<?php
/*Dadas las variables numericas de tipo entero $a, $b y $c reañozar una aplicacion
 que muestre el conterdio de aquella varianble que cpontenga el valor que encuentre
  en el medio de las tres variables. De no exostor dicho valor, mostrar un emnsaje
  que indique lo sucedido
 */
$a = 17;
$b = 20;
$c = 14;

$numMedio;

if(($a > $b && $a < $c) || ($a > $c && $a < $b )){
    $numMedio = $a;
}
elseif(($b > $a && $b < $c) || ($b > $c && $b < $a )){
    $numMedio = $b;
}
else{
    $numMedio = $c;
}

print($numMedio);
?>