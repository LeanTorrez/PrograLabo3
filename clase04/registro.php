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

if($_SERVER["REQUEST_METHOD"]  === "POST"){

    if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["clave"]) && isset($_FILES["foto"])){
    
        $destino = "Usuario/Fotos/".$_FILES["foto"]["name"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
    
        $usuario = new Usuario($_POST["email"],$_POST["clave"],$_POST["nombre"],$destino);
    
        echo Usuario::AltaUsuario($usuario);
    
    }else{
        echo "Parametros incorrectos";
    }
}else{
    echo "Verbo Incorrecto";
}
?>