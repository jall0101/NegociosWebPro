<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;


class Adminp extends PublicController {
   
    public function run() :void
    {
        $viewData = array();        
        Renderer::render('clientView/adminp', $viewData);
    }
}
?>