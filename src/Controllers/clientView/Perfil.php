<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Perfil extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/perfil', $viewData);
    }
}
?>