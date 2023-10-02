<?php
//LEANDRO EMANUEL TORREZ
use Usuario as GlobalUsuario;

class Usuario{
    private $_email;
    private $_nombre;
    private $_clave;

    function __construct($email, $clave, $nombre = "No definido")
    {
        $this->_email = $email;
        $this->_nombre = $nombre;
        $this->_clave = $clave;
    }

    public function RegistrarUsuarioCSV(){

        if(file_exists("./usuario.csv")){

            $archivo = fopen("./usuario.csv","a");
            $cadena = "$this->_nombre,$this->_email,$this->_clave\n";
            $retorno = fwrite($archivo,$cadena);
            fclose($archivo);
            if($retorno > 0){
                return true;
            }  
        } 
        return false;
    }

    static function LeerUsuarioCSV($retornoArray = false){

        if(file_exists("./usuario.csv")){
            $archivo = fopen("./usuario.csv","r");           
            while(!feof($archivo)){
               
                $parametros = fgetcsv($archivo,null,",");

                //cuando encuentra una linea en blanco devuelva false
                if($parametros !== false){
                    $usuario = new Usuario($parametros[1],$parametros[2],$parametros[0]);
                    $arrayUsuarios[] = $usuario;                   
                }            
            } 
            //parametro opcional para que devuelva el array de usuarios
            if($retornoArray){
                return $arrayUsuarios;
            }
            return self::FormatoCSV($arrayUsuarios);
        }
        return false;
    }

    public function MostrarUsuario(){
        return "Nombre: $this->_nombre, Email: $this->_email, Clave: ****";
    }

    private static function FormatoCSV($array){

        if(is_array($array)){

            $formato = "<ul>";

            foreach($array as $usuario){

                $formato .= "<li>".$usuario->MostrarUsuario()."<li/>";
            }
            $formato .= "<ul/>";
            
            return $formato;
        }
        return "ERROR";
    }

    public function Equals($usuario){
        $retorno = false;
        if($usuario instanceof Usuario){
            if($this->_email == $usuario->_email && $this->_clave == $usuario->_clave){
                $retorno = true;
            }else if($this->_email == $usuario->_email){
                $retorno = 1;
            }
        }
        return $retorno;
    }

    private function UsuarioErroneo($arrayUsuarios){
        $retorno = false;  
        if(is_array($arrayUsuarios)){        
            foreach($arrayUsuarios as $usuario){

                $retorno = $this->Equals($usuario);

                // Logica si el Equals retorna true es porque esta en el sistema
                // esto rompe el foreach porque no es necesario seguir buscando
                if($retorno === true){
                    $retorno = "Verificado";
                    break;

                    // 1 es en caso de que exista el email en el sistema pero la contraseña es erronea
                    // de esta forma rompe el foreach, se asume obviamente que no puede existir dos usuarios con el
                    // mismo email
                }else if($retorno === 1){
                    $retorno =  "Error en los datos";
                    break;

                    // En el Equals solamente se verifica si existe el email
                }else {
                    $retorno = "Usuario no registrado";                  
                }
                
            }
        }    
        return $retorno;
    }

    static function UsuarioEnSistema($usuario){
        $retorno = false;
        if($usuario instanceof Usuario){
            $arrayUsuarios = self::LeerUsuarioCSV(true);
            $retorno = $usuario->UsuarioErroneo($arrayUsuarios);        
        }
        return $retorno;
    }
}
?>