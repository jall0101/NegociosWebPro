<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Departamentos extends PublicController {
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