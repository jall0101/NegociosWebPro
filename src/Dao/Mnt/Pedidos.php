<?php
namespace Dao\Mnt;

use Dao\Table;

class Pedidos extends Table{

    public static function insert(int $ventacod, string $telefono, string $direccion, string $ciudad, string $estado, string $pais): int
    {
        $sqlstr = "INSERT INTO `pedidos`
        (
        `ventacod`,
        `direccion`,
        `ciudad`,
        `estado`,
        `pais`,
        `telefonoCont`)
        VALUES
        (
        :ventacod,
        :direccion,
        :ciudad,
        :estado,
        :pais,
        :telefonoCont);
        ";
        $rowsInserted = self::executeNonQuery(
            $sqlstr,
            array("ventacod"=>$ventacod, "direccion"=> $direccion, "ciudad" => $ciudad, "estado" => $estado, "pais"=>$pais, "telefonoCont" => $telefono)
        );
        return $rowsInserted;
    }

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