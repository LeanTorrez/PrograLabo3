<?php
/*obtenga la fecha acutal del servidor (Funcion date)
y luego imprimala dentro de la pagina con disitintos formatos.
ademas indicar que estacion del año es. Utilizar una structura selectiva multiple
*/

$fecha = date("D/M/Y");
$mes = date("M");

switch($mes){
    case "Jan":
    case "Feb":
    case "Mar":
        $estacion ="Es verano";
        break;
    case "Apr":
    case "May":
    case "Jun":
        $estacion = "Es otoño";
        break;
    case "Jul":
    case "Aug":
    case "Sep":
        $estacion = "Es invierno";
        break;
    case "Oct":
    case "Nov":
    case "Dec":
        $estacion = "Es primavera";
        break;
}

print("$fecha por lo tanto $estacion");

function _NumeroAPalabra($numero){
    
}
?>