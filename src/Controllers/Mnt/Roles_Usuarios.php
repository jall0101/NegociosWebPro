<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class Roles_Usuarios extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "roles_view"=>$this->isFeatureAutorized('mnt_roles_view'),
            "roles_edit"=>$this->isFeatureAutorized('mnt_roles_edit'),
            "roles_new"=>$this->isFeatureAutorized('mnt_roles_new')
        );
        $viewData["roles_usuarios"] = \Dao\Mnt\Roles_Usuarios::findAll();
        Renderer::render('mnt/roles_usuarios', $viewData);
    }
}
?>