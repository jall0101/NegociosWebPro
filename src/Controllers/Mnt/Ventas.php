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
            "ventas_view"=>$this->isFeatureAutorized('mnt_ventas_view')

        );
        $viewData["ventas"] = \Dao\Mnt\Ventas::findAll();
        Renderer::render('mnt/ventas', $viewData);
    }
}
?>