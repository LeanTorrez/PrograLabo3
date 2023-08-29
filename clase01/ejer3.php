<?php
/*
Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. 
Ejemplo 1: $a= 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
 */
$a = 1;
$b = 5;
$c = 4;

$numMedio;

//verifico que ningun numero se repita, sino no podria existir valor del medio
if( $a == $b || $a == $c || $b == $c){

    echo "No hay valor del medio";

}else{
    //en caso de no existan numeros igual se comparan las diferentes opciones posibles
    if(($a > $b && $a < $c) || ($a > $c && $a < $b )){
        $numMedio = $a;
    }
    else if(($b > $a && $b < $c) || ($b > $c && $b < $a )){
        $numMedio = $b;
    }
    else{
        $numMedio = $c;
    }

    echo "El valor del medio es $numMedio";
}

?>