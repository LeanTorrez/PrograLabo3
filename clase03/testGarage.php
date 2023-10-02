<?php
/*
LEANDRO EMANUEL TORREZ
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/
include "./ejer18.php";


$garage = new Garage("ni idea",1000);
$auto1 = new Auto("Toyota","azul");
$auto2 = new Auto("Volkswagen","rojo");
$auto3 = new Auto("Vokswagen","rojo");

echo "<br> ADD";
$garage->Add($auto1);
$garage->Add($auto2);
$garage->Add($auto3);

$garage->MostrarGarage();

echo "<br> EQUALS <br/>";

if($garage->Equals($auto3)){
    echo "El auto existe en el garage";
}else{
    echo "El auto no existe en el garage";
}

echo "<br> REMOVE";
$garage->Remove($auto3);
echo "<br><br/>";
$garage->MostrarGarage();

?>