<?php
include "../clase02/ejer17.php";


$auto = new Auto("Bugatti","Rojo");
$auto1 = new Auto("Volkswagen","Rojo");
$auto2 = new Auto("Toyota","Azul");
$auto3 = new Auto("Renault","Gris",1000);
$auto4 = new Auto("Renault","Gris",3000);
$auto5 = new Auto("Volkswagen","Amarillo",5000,date("D/M/Y"));

Auto::EscrituraAutoCSV($auto);
Auto::EscrituraAutoCSV($auto1);
Auto::EscrituraAutoCSV($auto2);
Auto::EscrituraAutoCSV($auto3);
Auto::EscrituraAutoCSV($auto4);
Auto::EscrituraAutoCSV($auto5);

$autos = Auto::LecturaAutoCSV();
var_dump($autos);
?>