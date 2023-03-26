<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Detalle extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/detalle', $viewData);
    }
}
?>