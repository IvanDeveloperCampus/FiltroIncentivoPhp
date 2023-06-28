<?php

namespace  Spukm01069\Backend\Controller;

use Spukm01069\Backend\Modelo\Campers;

class CamperController{


public function addCamper(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $camper=new Campers(...$_DATA);
    $camper->addCamper();
}

public function getAllCamper(){
    $data=Campers::getAllCampers();
    $json = json_encode($data);
    echo $json;
}

public function deleteCamper(int $id) {
    $res = Campers::deleteCamper($id);
    if ($res) {
        echo "Eliminado";
    } else {
        echo "Id incorrecto";
    }
}

public function updateCamper() {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $camper=new Campers(...$_DATA);
    $res = $camper->updateCamper();
    if ($res) {
        echo "Actualizado";
    } else {
        echo "Error al actualizar";
    }
}

}

?>