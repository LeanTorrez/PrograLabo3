<?php
/*
LEANDRO EMANUEL TORREZ 
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado. */ 

$arrayNumeros = array( rand(0,10) , rand(0,10) , rand(0,10) , rand(0,10) , rand(0,10) );
$suma = 0;
$promedio;
$mensaje;

for($i = 0; $i < count($arrayNumeros); $i++){
    $suma += $arrayNumeros[$i];
}

$promedio = $suma / 5;

if($promedio > 6){
    $mensaje = "El promedio dio $promedio por lo tanto fue a mayor a 6";
}else if($promedio == 6){
    $mensaje = "El promedio dio igual a 6";
}else{
    $mensaje = "El promedio dio $promedio por lo tanto fue menor a 6";
}
echo $mensaje;
?>