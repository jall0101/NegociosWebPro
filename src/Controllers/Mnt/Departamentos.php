<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class Departamentos extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["departamentos"] = \Dao\Mnt\Departamentos::findAll();
        Renderer::render('mnt/departamentos', $viewData);
    }
}
?>