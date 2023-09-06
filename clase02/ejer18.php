<?php
/*
LEANDRO EMANUEL TORREZ
Aplicación No 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.

Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);

Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);

En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/
include "./ejer17.php";

class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = 0){
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage(){
        echo "Razon social: $this->_razonSocial <br/>Precio Por Hora: $this->_precioPorHora<br/>";
        if(count($this->_autos) > 0){
            echo "<br>Autos en el Garage <br/>";
            foreach($this->_autos as $auto){   
                Auto::MostrarAuto($auto);              
            }
        }
    }

    public function Equals(Auto $auto){
        return in_array( $auto , $this->_autos );
    }
  
    public function Add(Auto $auto){
        if(!$this->Equals($auto)){
            $this->_autos[] = $auto;
            echo "<br/>Auto agregado";
        }else{
            echo "<br/>El auto ya esta en el garage";
        }
    }

    public function Remove(Auto $auto){
        if($this->Equals($auto)){
            $indice = array_search($auto , $this->_autos);
            unset($this->_autos[$indice]);          
            echo "<br/>Auto removido del garage";
        }else{
            echo "<br/>El auto no esta en el garage";
        }
    }
}
?>