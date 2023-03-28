<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Inicio extends PublicController {
   
    public function run() :void
    {
        /* localhost/NegociosWebPro/index.php?page=clienteView-Inicio */
        $viewData = array();        
        Renderer::render('clientView/inicio', $viewData);
    }
}
?>