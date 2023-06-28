<?php

namespace Spukm01069\Backend\Modelo;
use PDO;
use PDOException;
use Spukm01069\Backend\libs\Database;

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



    public function addCamper(){

        try {
            $query=Database::getInstance()->connect()->prepare('INSERT INTO campers (idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES (:idCamper, :nombreCamper, :apellidoCamper, :fechaNac, :idReg)');
            $query->execute([
            'idCamper'=>$this->idCamper,
            'nombreCamper'=>$this->nombreCamper,
            'apellidoCamper'=>$this->apellidoCamper,
            'fechaNac'=>$this->fechaNac,
            'idReg'=>$this->idReg
        ]);
        return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        
    }

    public static  function getAllCampers(){
       
        try {
            $campers=[];
            $query=Database::getInstance()->connect()->query('SELECT * FROM campers');
            while ($e=$query->fetch(PDO::FETCH_ASSOC)) {
                $camper=array(
                    $e['idCamper'], $e['nombreCamper'], $e['apellidoCamper'], $e['fechaNac'], $e['idReg']
                );

                array_unshift($campers, $camper);
            }

            return $campers;
        } catch (\Throwable $th) {
            echo  "error" . $th->getMessage();
        }
    }

    public static function deleteCamper(int $id){
        try {
           
            $query = Database::getInstance()->connect()->prepare('DELETE FROM campers WHERE idCamper=:idCamper');
            $query->execute(['idCamper' => $id]);
            $rowCount = $query->rowCount();
            return $rowCount > 0;
        } catch (PDOException $th) {
            echo  "error" . $th->getMessage();
        }
    }

    public function updateCamper(){
        try {
            
            $query = Database::getInstance()->connect()->prepare('UPDATE campers SET nombreCamper=:nombreCamper, apellidoCamper=:apellidoCamper, fechaNac=:fechaNac, idReg=:idReg WHERE idCamper=:idCamper');
            $query->execute([
                'idCamper'=>$this->idCamper,
                'nombreCamper'=>$this->nombreCamper,
                'apellidoCamper'=>$this->apellidoCamper,
                'fechaNac'=>$this->fechaNac,
                'idReg'=>$this->idReg
            ]);

            return true;
        } catch (PDOException $th) {
            echo  "error" . $th->getMessage();
        }
    }

  
}


?>