<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class Usuarios extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["usuarios"] = \Dao\Mnt\Usuarios::findAll();
        Renderer::render('mnt/usuarios', $viewData);
    }
}
?>