<?php
/**
 * Archivo Controlador de Marcas el Listado
 */
namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;
use Exception;

class DetallesVentas extends PublicController {
    private $viewData = array();

    public function run() :void
    {
        $this->page_loaded();       
        
        $this->viewData["detalles"] = \Dao\Mnt\DetallesVentas::findByVentaId($this->viewData["ventacod"]);
        Renderer::render('clientView/detallesVentas', $this->viewData);
    }

    private function page_loaded()
    {
        if (isset($_GET['ventacod'])) {
            $this->viewData["ventacod"] = intval($_GET["ventacod"]);
        } else {
            throw new Exception("Id not found on Query Params");
        }

    }
}
?>