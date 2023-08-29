<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
*/ 

$lapiceraUno = array("color" => "azul","marca" => "Bic", "Trazo" => "Fino" , "precio" => 550);
$lapiceraDos = array("color" => "roja","marca" => "Bic", "Trazo" => "Fino" , "precio" => 100);
$lapiceraTres = array("color" => "verde","marca" => "Bic", "Trazo" => "Grueso" , "precio" => 150);

echo "Lapicera Uno <br/>";
MostrarArray($lapiceraUno);

echo "<br/>Lapicera Dos<br/>";
MostrarArray($lapiceraDos);

echo "<br/>Lapicera Tres<br/>";
MostrarArray($lapiceraTres);

//Busque como se generan las funciones para no tenes que rehacer la muestra para cada array
function MostrarArray(array $array){

    foreach($array as $k => $valor){
        echo "$k -> $valor ";
    }
}
?>