<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Exception;
use Views\Renderer;

class Zapato extends PublicController{
    private $redirectTo = "index.php?page=Mnt-Zapatos";
        
    private $viewData = array(
        "mode" => "DSP",
        "modedsc" => "",
        "zapatocod" => 0,
        "departamentocod" => 0,
        "precio" => 0,
        "zapatoest" => "ACT",
        "zapatoest_ACT" =>"selected",
        "zapatoest_DES" => "",
        "imagenzapato" => "",
        "color" => "", 
        "descripcion" => "",        
        "detalles" => "",
        "nombrezapato" => "",
        "general_errors"=> array(),
        "has_errors" =>false,
        "show_action" => true,
        "readonly" => false,
        "xssToken" => "",
    );
    private $modes = array(
        "DSP" => "Detalle de %s (%s)",
        "INS" => "Nuevo Zapato",
        "UPD" => "Editar %s (%s)",
        "DEL" => "Borrar %s (%s)"
    );
    public function run() :void
    {
        try {
            $this->page_loaded();
            if($this->isPostBack()){
                $this->validatePostData();
                if(!$this->viewData["has_errors"]){
                    $this->executeAction();
                }
            }
            $this->render();
        } catch (Exception $error) {
            unset($_SESSION["xssToken_Mnt_Zapato"]);
            error_log(sprintf("Controller/Mnt/Zapato ERROR: %s", $error->getMessage()));
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
                $this->viewData["mode"] = $_GET['mode'];
            } else {
                throw new Exception("Mode Not available");
            }
        } else {
            throw new Exception("Mode not defined on Query Params");
        }
        if($this->viewData["mode"] !== "INS") {
            if(isset($_GET['zapatocod'])){
                $this->viewData["zapatocod"] = intval($_GET["zapatocod"]);
            } else {
                throw new Exception("Id not found on Query Params");
            }
        }
    }
    private function validatePostData(){
        if(isset($_POST["xssToken"])){
            if(isset($_SESSION["xssToken_Mnt_Usuario"])){
                if($_POST["xssToken"] !== $_SESSION["xssToken_Mnt_Zapato"]){
                    throw new Exception("Invalid Xss Token no match");
                }
            } else {
                throw new Exception("Invalid xss Token on session");
            }
        } else {
            throw new Exception("Invalid xss Token");
        }
        
        if(isset($_POST["username"])){
            if(\Utilities\Validators::IsEmpty($_POST["username"])){
                $this->viewData["has_errors"] = true;
                $this->viewData["general_errors"][] = "El username no puede ir vacío!";
            }
        } else {
            throw new Exception("username not present in form");
        }
        
        if(isset($_POST["zapatoest"])){
            if (!in_array( $_POST["zapatoest"], array("ACT","DES"))){
                throw new Exception("zapato state incorrect value");
            }
        }else {
            if($this->viewData["mode"]!=="DEL") {
                throw new Exception("zapatoest not present in form");
            }
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
        if(isset($_POST["zapatocod"])){
            if(($this->viewData["mode"] !== "INS" && intval($_POST["zapatocod"])<=0)){
                throw new Exception("zapatocod is not Valid");
            }
            if($this->viewData["zapatocod"]!== intval($_POST["zapatocod"])){
                throw new Exception("zapatocod value is different from query");
            }
        }else {
            throw new Exception("zapatocod not present in form");
        }
    }
    private function executeAction(){
        switch($this->viewData["mode"]){
            case "INS":
                $inserted = \Dao\Mnt\Zapatos::insert(
                    $this->viewData["departamentocod"],
                    $this->viewData["precio"],
                    $this->viewData["zapatoest"],
                    $this->viewData["imagenzapato"],
                    $this->viewData["color"],
                    $this->viewData["descripcion"],
                    $this->viewData["detalles"],
                    $this->viewData["nombrezapato"]
                );
                if($inserted > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Zapato añadido Exitosamente"
                    );
                }
                break;
            case "UPD":
                $updated = \Dao\Mnt\Zapatos::update(
                    $this->viewData["zapatocod"],
                    $this->viewData["departamentocod"],
                    $this->viewData["precio"],
                    $this->viewData["zapatoest"],
                    $this->viewData["imagenzapato"],
                    $this->viewData["color"],
                    $this->viewData["descripcion"],
                    $this->viewData["detalles"],
                    $this->viewData["nombrezapato"]
                );
                if($updated > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Zapato Actualizado Exitosamente"
                    );
                }
                break;
            case "DEL":
                $deleted = \Dao\Mnt\Zapatos::delete(
                    $this->viewData["zapatocod"]
                );
                if($deleted > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Zapato Eliminado Exitosamente"
                    );
                }
                break;
        }
    }
    private function render(){
        $xssToken = md5("ZAPATO" . rand(0,4000) * rand(5000,9999));
        $this-> viewData["xssToken"] = $xssToken;
        $_SESSION["xssToken_Mnt_Zapato"] = $xssToken;

        if($this->viewData["mode"] === "INS") {
            $this->viewData["modedsc"] = $this->modes["INS"];
        } else {
            $tmpZapatos = \Dao\Mnt\Zapatos::findById($this->viewData["zapatocod"]);
            if(!$tmpZapatos){
                throw new Exception("Zapatos no existe en DB");
            }
            \Utilities\ArrUtils::mergeFullArrayTo($tmpZapatos, $this->viewData);
            $this->viewData["zapatoest_ACT"] = $this->viewData["zapatoest"] === "ACT" ? "selected": "";
            $this->viewData["zapatoest_DES"] = $this->viewData["zapatoest"] === "DES" ? "selected": "";
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->viewData["mode"]],
                $this->viewData["departamentocod"],
                $this->viewData["precio"],
                $this->viewData["zapatoest"],
                $this->viewData["imagenzapato"],
                $this->viewData["color"],
                $this->viewData["descripcion"],
                $this->viewData["detalles"],
                $this->viewData["nombrezapato"],
                $this->viewData["zapatocod"]
            );
            if(in_array($this->viewData["mode"], array("DSP","DEL"))){
                $this->viewData["readonly"] = "readonly";
            }
            if($this->viewData["mode"] === "DSP") {
                $this->viewData["show_action"] = false;
            }
        }
        Renderer::render("mnt/zapato", $this->viewData);
    }
}

?>