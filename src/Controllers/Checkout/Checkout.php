<?php

namespace Controllers\Checkout;

use Controllers\PublicController;

class Checkout extends PublicController{    
    private $viewData = array(
        "cart" => array(),
        "contador" => 0,
        "subtotal" => 0,
        "total" => 0,
        "isv" => 0
    );
    public function run():void
    {
 
        if(!\Utilities\Security::isLogged())
        {
            \Utilities\Site::redirectToWithMsg("index.php?page=sec_login", "Debe iniciar sesión para poder comprar");
        }
        else{
            $user = intval(\Utilities\Security::getUserId());
            $this->viewData["cart"] = \Dao\Cart\Carretilla::findByUser($user);
            $amount= \Dao\Cart\Carretilla::obtenerTotalCarretilla($user);
            $quant = \Dao\Cart\Carretilla::obtenerSumaProductosCarretilla($user);
            $this->viewData["subtotal"] = floatval($amount["amount"]);       
            $this->viewData["isv"] = $this->viewData["subtotal"] * 0.15;
            $this->viewData["total"] = $this->viewData["subtotal"] + $this->viewData["isv"];

            if(!empty($quant["quantity"])){
                $this->viewData["contador"] = $quant["quantity"];
                $this->viewData["hasItems"] = true;
            }else{
                $this->viewData["contador"] = 0;
            }
    
            if ($this->isPostBack()) {
                $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                    "test".(time() - 10000000),
                    "http://localhost/NegociosWebPro/index.php?page=checkout_error",
                    "http://localhost/NegociosWebPro/index.php?page=checkout_accept"
                );
                $carrito = \Dao\Cart\Carretilla::findByUser($user);

                foreach($carrito as $producto){
                    $tax = (floatval($producto["crrprc"]) * floatval($producto["crrctd"]))*0.15;
                    $PayPalOrder->addItem($producto["nombrezapato"], "Color: ".$producto["color"].". Talla: ".$producto["descripciontalla"], $producto["talla_zapatocod"], $producto["crrprc"], $tax, $producto["crrctd"], "PHYSICAL_GOODS");
                }
                
                $response = $PayPalOrder->createOrder();
                $_SESSION["orderid"] = $response[1]->result->id;
                \Utilities\Site::redirectTo($response[0]->href);
                die();
            }
        }

        

        \Views\Renderer::render("paypal/checkout", $this->viewData);
    }
}
?>
