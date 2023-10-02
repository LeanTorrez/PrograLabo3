<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 20 BIS (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/
include "./usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["clave"])){
    $usuario = new Usuario($_POST["email"],$_POST["clave"],$_POST["nombre"]);

    if($usuario->RegistrarUsuarioCSV()){
        echo "Se pudo agregar el usuario correctamente";
    }else{
        echo "Ocurrio un error al agregar el usuario al registro";
    }

}else{
    echo "Parametros incorrectos";
}
?>