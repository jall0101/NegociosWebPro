<?php
/**
 * Archivo Controlador de Marcas el Listado
 */
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

/**
 * Marcas
 */
class Tallas extends PublicController {
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