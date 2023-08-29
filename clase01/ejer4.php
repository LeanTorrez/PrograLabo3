<?php
/*
Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/  
$op1 = 10;
$op2 = 1000;
$operador = "-";
$operacion;
$mensaje = "La operacion dio como resultado";
switch($operador){
case "+":
    $operacion = $op1 + $op2;
    $mensaje .= " $operacion";
    break;
case "-":
    $operacion = $op1 - $op2;
    $mensaje .= " $operacion";
    break;
case "/":
    if($op2 == 0){
        $mensaje = "ERROR/ No se puede dividir por 0";
    }else{
        $operacion = $op1 / $op2;
        $mensaje .= " $operacion";
    }
    break;
case "*":
    $operacion = $op1 * $op2;
    $mensaje .= " $operacion";
    break;
}

echo $mensaje;
?>