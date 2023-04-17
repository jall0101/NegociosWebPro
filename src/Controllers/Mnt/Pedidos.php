<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class Pedidos extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "pedidos_view"=>$this->isFeatureAutorized('mnt_pedidos_view'),
           

        );
        $viewData["pedidos"] = \Dao\Mnt\Pedidos::findAll();
        Renderer::render('mnt/Pedidos', $viewData);
    }
}
?>