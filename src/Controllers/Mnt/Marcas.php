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
class Marcas extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "edit_enabled"=>true,
            "delete_enabled"=>true,
            "new_enabled"=>true
        );
        $viewData["marcas"] = \Dao\Mnt\Marcas::findAll();
        Renderer::render('mnt/marcas', $viewData);
    }
}
?>