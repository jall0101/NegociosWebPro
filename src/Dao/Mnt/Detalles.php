<?php
namespace Dao\Mnt;
use Dao\Table;
class Detalles extends Table{

   
    public static function findAll(){
        $sqlstr = "SELECT * from detalleventa;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function findById(int $detallecod){
        $sqlstr = "SELECT * from detalleventa where detallecod = :detallecod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "detallecod"=> $detallecod
            )
        );
        return $row;
    }

   /* public static function findByUser(int $usercod){
        $sqlstr = "SELECT * from ventas where usercod = :usercod;";
        $row = self::obtenerRegistros(
            $sqlstr,
            array(
                "usercod"=> $usercod
            )
        );
        return $row;
    }*/
}
