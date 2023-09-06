<?php
/*

En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.

● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/

include "./ejer17.php";

$auto1 = new Auto("Toyota","Rojo");
$auto2 = new Auto("Toyota","Azul");


$auto3 = new Auto("Renault","Gris",1000);
$auto4 = new Auto("Renault","Gris",3000);

$auto5 = new Auto("Volkswagen","Amarillo",5000,date("D/M/Y"));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);


$importeSumado = Auto::Add($auto3,$auto4);
echo "IMPORTE SUMADO $importeSumado</br>";

echo "EQUALS <br/>";
if($auto1->Equals($auto2)){
    echo "el auto 1 y auto 2 son iguales";
}else{
    echo "el auto 1 y auto 2 no son iguales";
}
echo "<br/>";
if($auto1->Equals($auto5)){
    echo "el auto 1 y auto 5 son iguales";
}else{
    echo "el auto 1 y auto 5 no son iguales";
}
echo "<br> MUESTRA DE AUTOS <br/>";
Auto::MostrarAuto($auto1);
Auto::MostrarAuto($auto3);
Auto::MostrarAuto($auto5);
?>