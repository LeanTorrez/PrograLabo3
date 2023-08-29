<?php
/*Suma desde numero 1 que no supere al numero 1000. Mostrar numeros sumados, al
finalizar mostrar cuantos numero se sumaron
*/ 

$sumaNum = 1;
$arrayNum = array();
$i = 0;

while(true){
    $sumaNum += $i;

    if($sumaNum > 1000)
        break;

    $arrayNum[] = $sumaNum;
    print("$sumaNum \n");
    $i++;
}

print("La cantidad de numero que se sumaron fueron $i");
?>