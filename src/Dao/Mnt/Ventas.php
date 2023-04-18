<?php
namespace Dao\Mnt;
use Dao\Table;
class Ventas extends Table{

   
    public static function findAll(){
        $sqlstr = "SELECT * from ventas;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function findById(int $ventacod){
        $sqlstr = "SELECT * from ventas where ventacod = :ventacod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "ventacod"=> $ventacod
            )
        );
        return $row;
    }

    public static function findByUser(int $usercod){
        $sqlstr = "SELECT * from ventas where usercod = :usercod;";
        $row = self::obtenerRegistros(
            $sqlstr,
            array(
                "usercod"=> $usercod
            )
        );
        return $row;
    }
}
