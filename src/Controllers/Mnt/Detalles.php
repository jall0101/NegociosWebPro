<?php
/**
 * Archivo Controlador de Marcas el Listado
 */
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;


class Ventas extends PrivateController {
    public function run() :void
    {
        $viewData = array(
            "detalles_view"=>$this->isFeatureAutorized('mnt_detalles_view')

        );
        $viewData["detalles"] = \Dao\Mnt\Ventas::findAll();
        Renderer::render('mnt/detalles', $viewData);
    }
}
?>