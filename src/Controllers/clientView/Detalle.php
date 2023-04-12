<?php

namespace Controllers\clientView;

use Controllers\PublicController;
use Views\Renderer;
use Exception;


class Detalle extends PublicController
{

    private $redirectTo = "index.php?page=index";
    private $viewData = array(
        "zapatocod" => ""
    );

    private $viewData2 = array(
        "zapatocod" => "",
        "marcacod" => "",
        "departamentocod"=>"",
        "precio" => "",
        "imagenzapato" => "",
        "zapatoest"=>"",
        "color" => "",
        "descripcion" => "",
        "detalles" => "",
        "nombrezapato" => "",
        "related" => array(),
        "tallas" => array()

    );
    public function run(): void
    {
        try {            
            $this->page_loaded();
            $zapato = \Dao\Mnt\Zapatos::findById($this->viewData["zapatocod"]);
            \Utilities\ArrUtils::mergeFullArrayTo($zapato, $this->viewData2);
            $this->viewData2["related"] = \Dao\Mnt\Zapatos::findByRelated($this->viewData2["marcacod"], $this->viewData2["departamentocod"],$this->viewData2["zapatocod"]);
            $this->viewData2["tallas"] = \Dao\Mnt\Zapatos::findSizes($this->viewData2["zapatocod"]);

            Renderer::render('clientView/detalle', $this->viewData2);
        } catch (Exception $error) {           
            error_log(sprintf("Controller/Mnt/Detalle ERROR: %s", $error->getMessage()));
            \Utilities\Site::redirectToWithMsg(
                $this->redirectTo,
                "Algo Inesperado Sucedió. Intente de Nuevo."
            );
        }

    }

    private function page_loaded()
    {
        if (isset($_GET['zapatocod'])) {
            $this->viewData["zapatocod"] = intval($_GET["zapatocod"]);
        } else {
            throw new Exception("Id not found on Query Params");
        }

    }
}
?>