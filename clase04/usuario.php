<?php
//LEANDRO EMANUEL TORREZ
class Usuario{
    private $_id;
    private $_email;
    private $_nombre;
    private $_clave;
    private $_imagen;
    private $_fecha;

    function __construct($email, $clave, $nombre = "No definido",$imagen = "sin imagen",$id = "-1", $fecha = "sin fecha")
    {
        $this->_email = $email;
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_imagen = $imagen;

        if($id === "-1" && $fecha === "sin fecha"){
            $this->_id = rand(1,10000);
            $this->_fecha = date("D/M/Y");
        }else{
            $this->_id = $id;
            $this->_fecha = $fecha;
        }
    }

    public function MostrarUsuario(){
        return "Id: $this->_id, Nombre: $this->_nombre, Email: $this->_email,Fecha Creacion: $this->_fecha, Clave: ****";
    }

    private function GetUsuario(){
        foreach($this as $k => $valor){
            $array[$k] = $valor; 
        }
        return $array;
    }

    private function GetId(){
        return $this->_id;
    }

    private static function LeerJson(){
        $array = array();
        if(file_exists("./Usuario.json")){

            $archivo = fopen("./Usuario.json","r");
            
            while(!feof($archivo)){
                $parametros = fgets($archivo);
                if($parametros !== false){

                    $std = json_decode($parametros);

                    $usuario = new Usuario($std->_email,$std->_clave,$std->_nombre,$std->_imagen,$std->_id,$std->_fecha);
                    array_push($array,$usuario);              
                }    
            }
            fclose($archivo);
            return $array;
        }
        return false;
    }

    public static function Listado(){

        $array = self::LeerJson();

        if($array !== false){

            $formato = "<ul>";

            foreach($array as $usuario){

                $formato .= "<li>".$usuario->MostrarUsuario()."<li/>";
            }
            $formato .= "<ul/>";
            
            return $formato;
        }
        return "ERROR";
    }

    public static function VerificarId($id){
        $retorno = false;
        $array = self::LeerJson();
        if($array !== false){
            foreach($array as $usuario){
                if($usuario->GetId() == $id){
                    $retorno = true;
                    break;
                }
            }
        }
        return $retorno;
    }

    static function AltaUsuario($usuario){
        $retorno = false;
        if($usuario instanceof Usuario){
            if(file_exists("./Usuario.json")){

                $archivo = fopen("./Usuario.json","a");       
                $jsonString = json_encode($usuario->GetUsuario());
                $retorno = fwrite($archivo, $jsonString."\n");
                if($retorno > 0){
                    $retorno = "Se dio alta al Usuario";
                }else{
                    $retorno = "Error en la alta";
                }
                fclose($archivo);
            }
        }
        return $retorno;
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