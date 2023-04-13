<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Perfil extends PublicController {
   
    public function run() :void
    {
        $viewData = array(
            "clientname" => "",
            "clientgender" => "",
            "clientphone1" => "",
            "clientemail" => ""
        ); 
        $cod = \Utilities\Security::getUserId();
        $cliente = \Dao\Mnt\Clientes::findByUserId($cod);
        \Utilities\ArrUtils::mergeFullArrayTo($cliente, $viewData);
        
        Renderer::render('clientView/perfil', $viewData);
    }
}
?>