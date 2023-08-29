<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/ 


$num = 43;
$numEnTexto;
if($num > 19 && $num < 61){

    //convierto en string la numero para poder fijarme el decimal
    $numStr = strval($num);

    //Verificio que decimal para saber que numero es
    switch($numStr[0]){
        case "2":
            $numEnTexto = "Veinte";
            break;
        case "3":
            $numEnTexto = "Treinta";
            break;
        case "4":
            $numEnTexto = "Cuarenta";
            break;
        case "5":
            $numEnTexto = "Cincuenta";
            break;
        case "6":
            $numEnTexto = "Sesenta";
            break;
    }

    //En caso que la unidad no sea 0 se rellenara con y su unidad correspondiente

    if($numStr[1] != 0){

        $numEnTexto .= " y ";
        switch($numStr[1]){
            case "1":
                $numEnTexto .= "Uno";
                break;
            case "2":
                $numEnTexto .= "Dos";
                break;
            case "3":
                $numEnTexto .= "Tres";
                break;
            case "4":
                $numEnTexto .= "Cuatro";
                break;
            case "5":
                $numEnTexto .= "Cinco";
                break;
            case "6":
                $numEnTexto .= "Seis";
                break;
            case "7":
                $numEnTexto .= "Siete";
                break;
            case "8":
                $numEnTexto .= "Ocho";
                break;
            case "9":
                $numEnTexto .= "Nueve";
                break;
        }
    }

echo($numEnTexto);
}

?>