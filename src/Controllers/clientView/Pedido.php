<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Pedido extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/pedido', $viewData);
    }
}
?>
