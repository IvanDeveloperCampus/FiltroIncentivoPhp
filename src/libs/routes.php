<?php

use Spukm01069\Backend\Controller\CamperController;

$router=new \Bramus\Router\Router();

$router->get("/get", function(){
    $controller=new CamperController();
    $controller->getAllCamper();
});

$router->post("/add", function(){
    $controller=new CamperController();
    $controller->addCamper();
});

$router->delete("/{id}", function($id) {
    $controller=new CamperController();
    $controller->deleteCamper($id);
});

$router->put("/update", function() {
    $controller=new CamperController();
    $controller->updateCamper();
});


$router->run();

?>