<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems ,por
POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). carga
los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases */
include "./producto.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["codigo"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidad"])){
        echo Producto::Venta($_POST["codigo"],$_POST["idUsuario"],$_POST["cantidad"]);
    }else{
        echo "Parametros incorrectos";
    }
    
}else{
    echo "Verbo Incorrecto";
}

?>