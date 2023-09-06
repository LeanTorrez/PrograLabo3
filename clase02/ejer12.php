<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$textoInvertido = InvertirPalabra("Profesor");

echo $textoInvertido;

function InvertirPalabra($palabra){

    for($i = strlen($palabra) - 1;$i > -1; $i--){

        $invertido[] = $palabra[$i];
        
    }
    return implode($invertido);

}

?>