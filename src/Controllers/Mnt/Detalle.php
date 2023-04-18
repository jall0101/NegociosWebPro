<?php
namespace Controllers\Mnt;
use Controllers\PrivateController;
use Exception;
use Views\Renderer;

class Detalle extends PrivateController{
    private $redirectTo = "index.php?page=Mnt-Detalles";
    private $viewData = array(
        "mode" => "DSP",
        "modedsc" => "",
        "detallecod" => 0,
        "nombrezapato" => "",
        "descripcion" => "",  
        "cantidad" => 0,
        "precio" => 0,
        "importe" => 0,
        "has_errors" =>false,
        "show_action" => true,
        "readonly" => false,
        "xssToken" =>""
    );
    private $modes = array(
        "DSP" => "Detalle de %s (%s)",
    );

    private $modesAuth = array(
        "DSP" => "mnt_detalles_view",
    );

    public function run() :void
    {
        try {
            $this->page_loaded();
            if($this->isPostBack()){
                $this->validatePostData();
            }
            $this->render();
        } catch (Exception $error) {
            unset($_SESSION["xssToken_Mnt_Detalle"]);
            error_log(sprintf("Controller/Mnt/Detalle ERROR: %s", $error->getMessage()));
            \Utilities\Site::redirectToWithMsg(
                $this->redirectTo,
                "Algo Inesperado Sucedió. Intente de Nuevo."
            );
        }
    }


    private function page_loaded()
    {
        if(isset($_GET['mode'])){
            if(isset($this->modes[$_GET['mode']])){
                if (!$this->isFeatureAutorized($this->modesAuth[$_GET['mode']])) {
                    throw new Exception("Mode is not Authorized!");
                }
                $this->viewData["mode"] = $_GET['mode'];
            } else {
                throw new Exception("Mode Not available");
            }
        } else {
            throw new Exception("Mode not defined on Query Params");
        }
        if($this->viewData["mode"] !== "INS") {
            if(isset($_GET['detallecod'])){
                $this->viewData["detallecod"] = intval($_GET["detallecod"]);
            } else {
                throw new Exception("Id not found on Query Params");
            }
        }
    }


    private function validatePostData(){
        if(isset($_POST["xssToken"])){
            if(isset($_SESSION["xssToken_Mnt_Detalle"])){
                if($_POST["xssToken"] !== $_SESSION["xssToken_Mnt_Detalle"]){
                    throw new Exception("Invalid Xss Token no match");
                }
            } else {
                throw new Exception("Invalid Xss Token on Session");
            }
        } else {
            throw new Exception("Invalid Xss Token");
        }
      
        
        if(isset($_POST["mode"])){
            if(!key_exists($_POST["mode"], $this->modes)){
                throw new Exception("mode has a bad value");
            }
            if($this->viewData["mode"]!== $_POST["mode"]){
                throw new Exception("mode value is different from query");
            }
        }else {
            throw new Exception("mode not present in form");
        }
        if(isset($_POST["detallecod"])){
            if(($this->viewData["mode"] !== "INS" && intval($_POST["detallecod"])<=0)){
                throw new Exception("detallecod is not Valid");
            }
            if($this->viewData["detallecod"]!== intval($_POST["detallecod"])){
                throw new Exception("detallecod value is different from query");
            }
        }else {
            throw new Exception("detallecod not present in form");
        }
      
    }
    
   
    private function render(){
        $xssToken = md5("DETALLE" . rand(0,4000) * rand(5000, 9999));
        $this->viewData["xssToken"] = $xssToken;
        $_SESSION["xssToken_Mnt_Detalle"] = $xssToken;

        if($this->viewData["mode"] === "INS") {
            $this->viewData["modedsc"] = $this->modes["INS"];
        } else {
            $tmpDetalles = \Dao\Mnt\Detalles::findById($this->viewData["detallecod"]);
            if(!$tmpDetalles){
                throw new Exception("no existe en DB");
            }
            
            \Utilities\ArrUtils::mergeFullArrayTo($tmpDetalles, $this->viewData);

            
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->viewData["mode"]],
                $this->viewData["nombrezapato"],
                $this->viewData["descripcion"],
                $this->viewData["cantidad"],
                $this->viewData["precio"],
                $this->viewData["importe"]
            );
            
            if(in_array($this->viewData["mode"], array("DSP","DEL"))){
                $this->viewData["readonly"] = "readonly";
            }
            if($this->viewData["mode"] === "DSP") {
                $this->viewData["show_action"] = false;
            }
        }
        Renderer::render("mnt/venta", $this->viewData);
    }
}



?>