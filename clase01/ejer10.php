<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
*/

$lapiceraUno = array("color" => "azul","marca" => "Bic", "Trazo" => "Fino" , "precio" => 550);
$lapiceraDos = array("color" => "roja","marca" => "Bic", "Trazo" => "Fino" , "precio" => 100);
$lapiceraTres = array("color" => "verde","marca" => "Bic", "Trazo" => "Grueso" , "precio" => 150);

$arrayLapiceras = array($lapiceraUno, $lapiceraDos, $lapiceraTres);

for($i = 0; $i < count($arrayLapiceras); $i++){

    echo "<br/>Lapicera",$i + 1,"<br/>";
    MostrarArray($arrayLapiceras[$i]);

}


//Busque como se generan las funciones para no tener que rehacer la muestra para cada array
function MostrarArray(array $array){

    foreach($array as $k => $valor){
        echo "$k -> $valor ";
    }
}
?>