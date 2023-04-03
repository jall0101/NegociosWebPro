<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Niños extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/niños', $viewData);
    }
}
?>