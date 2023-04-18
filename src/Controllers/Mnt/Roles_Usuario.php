<?php
namespace Controllers\Mnt;

use Controllers\PrivateController;
use Exception;
use Views\Renderer;
/*
/*
CREATE TABLE `roles_usuarios` (
  `usercod` bigint(10) NOT NULL,
  `rolescod` varchar(15) NOT NULL,
  `roleuserest` char(3) DEFAULT NULL,
  `roleuserfch` datetime DEFAULT NULL,
  `roleuserexp` datetime DEFAULT NULL,
*/

class Rol extends PrivateController{
    private $redirectTo = "index.php?page=Mnt-Roles";
    private $viewData = array(
        "mode" => "DSP",
        "modedsc" => "",
        "usercod" => 0,
        "rolescod" => "",
        "roleuserest" => "DSP",
        "roleuserfch" => "",        
        "roleuserexp" => "",      
        "general_errors"=> array(),
        "has_errors" =>false,
        "show_action" => true,
        "readonly" => false,
        "readonly_edit" => false,
        "xssToken" => ""
    );
    private $modes = array(
        "DSP" => "Detalle de %s (%s)",
        "INS" => "Nuevo Roles",
        "UPD" => "Editar %s (%s)",

    );
    private $modesAuth = array(
        "DSP" => "mnt_roles_usuario_view",
        "INS" => "mnt_roles_usuario_new",
        "UPD" => "mnt_roles_usuario_edit",
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
            unset($_SESSION["xssToken_Mnt_Rol"]);
            error_log(sprintf("Controller/Mnt/Roles_Usuario ERROR: %s", $error->getMessage()));
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
            if(isset($_GET['usercod'])){
                $this->viewData["usercod"] = $_GET["usercod"];
            } else {
                throw new Exception("Id not found on Query Params");
            }
        }
    }
    private function validatePostData(){
        if(isset($_POST["xssToken"])){
            if(isset($_SESSION["xssToken_Mnt_Rol"])){
                if($_POST["xssToken"] !== $_SESSION["xssToken_Mnt_Rol"]){
                    throw new Exception("Invalid Xss Token no match");
                }
            } else {
                throw new Exception("Invalid xss Token on session");
            }
        } else {
            throw new Exception("Invalid xss Token");
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
        if(isset($_POST["usercod"])){            
            if($this->viewData["usercod"]!== $_POST["usercod"] && $this->viewData["mode"] !== "INS"){
                throw new Exception("usercod value is different from query");
            }
        }else {
            throw new Exception("usercod not present in form");
        }
        if($this->viewData["mode"] === "INS"){
            $this->viewData["usercod"] = $_POST["usercoddummy"];       
            
        }        
    }
    private function executeAction(){
        switch($this->viewData["mode"]){
            case "INS":
                $inserted = \Dao\Mnt\Roles::insert(
                    $this->viewData["rolescod"],
                    $this->viewData["rolesdsc"],
                    $this->viewData["rolesest"]                    
                );
                if($inserted > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Rol Creado Exitosamente"
                    );
                }
                break;
            case "UPD":
                $updated = \Dao\Mnt\Roles::update(
                    $this->viewData["rolescod"],
                    $this->viewData["rolesdsc"],
                    $this->viewData["rolesest"] 
                );
                if($updated > 0){
                    \Utilities\Site::redirectToWithMsg(
                        $this->redirectTo,
                        "Rol Actualizado Exitosamente"
                    );
                }
    }
}
    private function render(){
        $xssToken = md5("ROLES_USUARIO" . rand(0,4000) * rand(5000,9999));
        $this-> viewData["xssToken"] = $xssToken;
        $_SESSION["xssToken_Mnt_Roles_Usuario"] = $xssToken;

        if($this->viewData["mode"] === "INS") {
            $this->viewData["modedsc"] = $this->modes["INS"];
        } else {
            $tmpRoles = \Dao\Mnt\Roles_Usuarios::findById($this->viewData["rolescod"]);
            if(!$tmpRoles){
                throw new Exception("Rol no existe en DB");
            }
            \Utilities\ArrUtils::mergeFullArrayTo($tmpRoles, $this->viewData);
            $this->viewData["rolesest_ACT"] = $this->viewData["rolesest"] === "ACT" ? "selected": "";
            $this->viewData["rolesest_INA"] = $this->viewData["rolesest"] === "INA" ? "selected": "";
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->viewData["mode"]],
                $this->viewData["usercod"],
                $this->viewData["rolescod"],
                $this->viewData["roleuserest"],
                $this->viewData["roleuserfch"],
                $this->viewData["roleuserexp"]
            );
            if($this->viewData["mode"] === "DSP") {
                $this->viewData["show_action"] = false;
            }
            if($this->viewData["mode"] === "UPD"){
                $this->viewData["readonly_edit"] = "readonly";
            }
        }
        Renderer::render("mnt/roles_usuario", $this->viewData);
    }
}

?>