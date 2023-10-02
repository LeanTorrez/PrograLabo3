<?php
/*
LEANDRO EMANUEL TORREZ
código de barra (6 cifras ),nombre ,tipo, stock, precio )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000) 
crear un objeto y
utilizar sus métodos para poder verificar si es un producto existente, si ya existe el producto se le
suma el stock , de lo contrario se agrega al documento en un nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase */
include "./usuario.php";
class Producto{

    private $_id;
    private $_codigoBarra;
    private $_nombre;
    private $_tipo;
    private $_stock;
    private $_precio;

    public function __construct($codigo,$nombre,$tipo,$stock,$precio,$id = -1)
    {
        if($id !== -1){
            $this->_id = $id;
        }else{
            $this->_id = rand(1,10000);
        }
        $this->_codigoBarra = $codigo;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
    }
                
    private static function LeerJson(){
        $array = array();
        if(file_exists("./producto.json")){

            $archivo = fopen("./producto.json","r");
            
            while(!feof($archivo) && filesize("./producto.json")){
                $parametros = fgets($archivo);
                if($parametros !== false){
                    $std = json_decode($parametros);
                    $producto = new Producto($std->_codigoBarra,$std->_nombre,$std->_tipo,$std->_stock,$std->_precio,$std->_id);
                    array_push($array, $producto);              
                }    
            }
            fclose($archivo);
            return $array;
        }
        return false;

    }

    private function GetProducto(){
        foreach($this as $k => $valor){
            $array[$k] = $valor; 
        }
        return $array;
    }

    private function GetCodigoBarra(){
        return $this->_codigoBarra;
    }

    public static function AltaProducto($producto){
        $retorno =  "No se pudo Ingresar el Producto";
        if($producto instanceof Producto){

            $array = self::LeerJson();
            if($array !== false){

                $index = $producto->AgregarStock($array);
                if($index > -1){
                    $array[$index] = $producto;
                    $retorno = "Actualizado";
                }else{
                    array_push($array,$producto);
                    $retorno = "Ingresado";
                }
                self::EscribirJsonProducto($array);
            }
        }
        return $retorno;
    }

    private static function EscribirJsonProducto($array){
        if(is_array($array) && file_exists("./producto.json")){
            $archivo = fopen("./producto.json","w");
            
            foreach($array as $producto){

                $jsonString = json_encode($producto->GetProducto());
                $retorno = fwrite($archivo,$jsonString."\n");
                if($retorno < 1){
                    echo "Existio un error en la escritura del json";
                    break;
                }
            }
            fclose($archivo);
        }
    }

    public static function Venta($codigo, $idUsuario, $cantidad){
        $retorno = "No existe un usuario o producto con esas Especificaciones";

        $array = self::LeerJson();

        if(self::VerificarCodigo($codigo, $array) && Usuario::VerificarId($idUsuario)){

            $index = self::VerificarCodigo($codigo, $array, $cantidad);

            if($index > -1){            
                $retorno = self::QuitarStock($index, $array, 
                array("codigo"=> $codigo, "idUsuario" => $idUsuario, "cantidad" => $cantidad));
            }else{
                $retorno = "El producto no posee las sufientes existencias para la venta";
            }
        }
        return $retorno;
    }

    private static function QuitarStock($index, $array, $arrayDatos){
        
        $arrayVenta = self::LeerJsonVenta();

        if($arrayVenta !== false){
            //Modifico el stock del producto en cuestion
            $array[$index]->SetStock( $array[$index]->GetStock() - $arrayDatos["cantidad"] );
            self::EscribirJsonProducto($array);
            return self::ExisteVenta($arrayVenta, $arrayDatos);
        }

    }

    private static function ExisteVenta($arrayVenta, $arrayDatos){
        $bandera = false;
        $retorno = "Se agrego la nueva venta";

        foreach($arrayVenta as $venta){
            if($venta->codigo === $arrayDatos["codigo"] && $venta->idUsuario === $arrayDatos["idUsuario"]){

                $index = array_search($venta,$arrayVenta);
                $arrayVenta[$index]->cantidad = intval($arrayVenta[$index]->cantidad) + intval($arrayDatos["cantidad"]);
                $bandera = true;
                $retorno = "Se actualizo la venta";
                break;
            }
        }

        if(!$bandera){
            array_push($arrayVenta,$arrayDatos);
        }
        self::EscribirJsonVenta($arrayVenta);
        return $retorno;
    }

    private static function LeerJsonVenta(){
        $array = array();
        if(file_exists("./venta.json")){

            $archivo = fopen("./venta.json","r");
            
            while(!feof($archivo) && filesize("./venta.json")){

                $parametros = fgets($archivo);

                if($parametros !== false){
                    $std = json_decode($parametros);
                    array_push($array, $std);              
                }    
            }
            fclose($archivo);
            return $array;
        }
        return false;
    }

    private static function EscribirJsonVenta($array){
        if(is_array($array) && file_exists("./venta.json")){
            $archivo = fopen("./venta.json","w");


            foreach($array as $venta){

                $jsonString = json_encode($venta);
                $retorno = fwrite($archivo,$jsonString."\n");
                if($retorno < 1){
                    echo "Existio un error en la escritura del json";
                    break;
                }
            }
            fclose($archivo);
        }
    }

    private static function VerificarCodigo($codigo, $arrayProductos, $cantidad = -1){
        $retorno = false;
        if($arrayProductos !== false){

            foreach($arrayProductos as $producto){

                if($producto->GetCodigoBarra() === $codigo){

                    if($cantidad !== -1){

                       if($producto->VerificarStock($cantidad)){
                            $retorno = array_search($producto, $arrayProductos);
                       }else{
                            $retorno = -1;
                       }

                    }else{
                        $retorno = true;
                    }
                    break;
                }
            }
        }
        return $retorno;
    }

    private function VerificarStock($cantidad){
        return $this->GetStock() >= $cantidad; 
    }

    private function AgregarStock($array){
        $retorno = false;
        if(is_array($array)){

            foreach($array as $producto){

                if($this->Equals($producto)){
                    $this->_stock += $producto->GetStock();
                    $retorno = array_search($producto,$array);
                    break;
                }
            }
        }
        return $retorno;
    }

    public function GetStock(){
        return $this->_stock;
    }

    public function SetStock($stock){
        $this->_stock = $stock;
    }

    private function Equals($producto){
        $retorno = false;
        if($producto instanceof Producto){
            $retorno = $this->_codigoBarra === $producto->_codigoBarra;
        }
        return $retorno;
    }
}
?>