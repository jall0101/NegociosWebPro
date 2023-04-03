<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Caballeros extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/caballeros', $viewData);
    }
}
?>