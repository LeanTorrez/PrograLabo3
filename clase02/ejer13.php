<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario.
*/

$retorno = verificarMaxCaracteres("dawdawdawdawdawdwa",5);

echo $retorno;

function verificarMaxCaracteres($texto , $max){
    $retorno = "la palabra Excede el maximo de caracteres";

    if(strlen($texto) < $max ){

        if($texto == "Recuperatorio" || $texto == "Parcial" || $texto == "Programacion"){     
            $retorno = 1;
        }else{
            $retorno = 0;
        }   

    }
    return $retorno;
    
}

?>