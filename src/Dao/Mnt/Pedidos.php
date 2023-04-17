<?php
namespace Dao\Mnt;

use Dao\Table;

class Pedidos extends Table{

    public static function findAll(){
        $sqlstr = "SELECT * from pedidos;";
        return self::obtenerRegistros($sqlstr, array());
    }
    public static function findByFilter(){

    }
    public static function findById(int $pedidocod){
        $sqlstr = "SELECT * from pedidos where pedidocod = :pedidocod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "pedidocod"=> $pedidocod
            )
        );
        return $row;
    }
}