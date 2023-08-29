<?php 
/*
LEANDRO EMANUEL TORREZ
Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach. */ 

$arrayImpares = array();

for($i = 0; count($arrayImpares) < 10; $i++){
    if($i % 2 == 1){
        $arrayImpares[count($arrayImpares)] = $i;
    }
}

//echo "<br> Ciclo repetitivo For";
for($i = 0; $i < count($arrayImpares); $i++){
    echo "<br/>",$arrayImpares[$i];
}

//echo "<br> Ciclo repetitivo While";
$contador = 0;
while($contador < count($arrayImpares)){
    echo "<br/>",$arrayImpares[ $contador];
    $contador++;
}

//echo "<br> Ciclo repetitivo Foreach";
foreach($arrayImpares as $impar){
    echo "<br/>",$impar;
}

?>