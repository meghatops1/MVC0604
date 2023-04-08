<?php
include("Controller/Controller.php");

$controller= new Controller();

if(isset($_SERVER['PATH_INFO'])){
    $path = $_SERVER['PATH_INFO'];
    echo "<br>";
    switch($path){
        case '/create':
            $controller->create();
        break;    
        case '/index':
            $controller->index();
        break;    
        default:
          echo "PAGE NOT FOUND";
          break;
    }
}




?>