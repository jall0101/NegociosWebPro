<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Damas extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/damas', $viewData);
    }
}
?>