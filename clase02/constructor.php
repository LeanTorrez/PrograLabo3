<?php

$morena = new Perro();

//var_dump($morena);

$zaira = new Perro("Zaira");

$blanca = new Perro("Blanca",4);

$nico = new Perro("Nico",13,"Gris");

$bianca = new Perro("Bianca",13,"Crema","Labrador");

var_dump($bianca);
class Perro{

    private $_color;
    private $_raza;
    private $_edad;
    private $_nombre;

    function __construct()
    {
        $argumentos = func_get_args();
        $numArgumentos = func_num_args();

        $funcConstructor ='__construct'.$numArgumentos;

        if(method_exists($this,$funcConstructor)){
            call_user_func_array(array($this,$funcConstructor),$argumentos);
        }   
    }

    private function __construct0()
    {
        $this->_color = "Sin color";
        $this->_raza = "Sin Raza";
        $this->_edad = 0;
        $this->_nombre = "Sin nombre";
    }

    private function __construct1($nombre)
    {
        $this->__construct0();
        $this->_nombre = $nombre;
    }

    private function __construct2($nombre , $edad)
    {
        $this->__construct1($nombre);
        $this->_edad = $edad;
    }

    private function __construct3($nombre , $edad , $color)
    {
        $this->__construct2($nombre,$edad);
        $this->_color = $color;
    }

    private function __construct4($nombre , $edad,$color , $raza)
    {
        $this->__construct3($nombre,$edad,$color);
        $this->_raza = $raza;
    }


}
?>