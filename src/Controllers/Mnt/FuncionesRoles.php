<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class FuncionesRoles extends PublicController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["funcionesroles"] = \Dao\Mnt\FuncionesRoles::findAll();
        Renderer::render('mnt/funcionesroles', $viewData);
    }
}
?>