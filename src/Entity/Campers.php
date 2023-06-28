<?php

namespace Spukm01069\Backend\Entity;

class Campers{
     private $idCamper, $nombreCamper, $apellidoCamper, $fechaNac, $idReg;


     public function __construct(string $idCamper, string $nombreCamper, string $apellidoCamper, string $fechaNac, int $idReg)
     {
         $this->idCamper=$idCamper;
         $this->nombreCamper=$nombreCamper;
         $this->apellidoCamper=$apellidoCamper;
         $this->fechaNac=$fechaNac;
         $this->idReg=$idReg;          
     }

     public function __get($name){
        if (property_exists($this, $name)) {
            return $this->{$name};
        }
    }

    public function __set($name, $value){
        if (property_exists($this, $name)) {
            return $this->$name=$value;
        }
    }
}


?>