<?php
/**
 * Archivo Controlador de Marcas el Listado
 */
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

/**
 * Marcas
 */
class Tallas extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["tallas"] = \Dao\Mnt\Tallas::findAll();
        Renderer::render('mnt/tallas', $viewData);
    }
}
?>