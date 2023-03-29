<?php
namespace Dao\Mnt;
use Dao\Table;

class FuncionesRoles extends Table{
    
    public static function insert(string $rolescod ,string $fncod, string $fnrolest="ACT", string $fnexp): int
    {
        $dateTime = new \DateTime("now", new \DateTimeZone("UTC"));
        $fnexp = $dateTime->format(\DateTimeInterface::W3C);
        $sqlstr = "INSERT INTO funciones_roles (rolescod, fncod, fnrolest, fnexp) 
            values(:rolescod, :fncod, :fnrolest, :fnexp);";
        $rowsInserted = self::executeNonQuery(
            $sqlstr,
            array(
                "rolescod"=>$rolescod, 
                "fncod"=>$fncod, 
                "fnrolest"=>$fnrolest, 
                "fnexp" => $fnexp
            )
        );
        return $rowsInserted;
    }


    public static function update(string $rolescod ,string $fncod, string $fnrolest, string $fnexp){
        $sqlstr = "UPDATE funciones_roles set fncod = :fncod, fnrolest = :fnrolest, fnexp = :fnexp where rolescod=:rolescod;";
        $rowsUpdated = self::executeNonQuery(
            $sqlstr,
            array(
                "fncod" => $fncod,
                "fnrolest" => $fnrolest,
                "fnexp" => $fnexp,
                "rolescod"  => $rolescod
            )
        );
        return $rowsUpdated;
    }

    public static function delete(string $rolescod){
        $sqlstr = "DELETE from funciones_roles where rolescod = :rolescod;";
        $rowsDeleted = self::executeNonQuery(
            $sqlstr,
            array(
                "rolescod" => $rolescod
            )
        );
        return $rowsDeleted;
    }
    public static function findAll(){
        $sqlstr = "SELECT * from funciones_roles;";
        return self::obtenerRegistros($sqlstr, array());
    }
    public static function findByFilter(){

    }
    public static function findById(string $rolescod){
        $sqlstr = "SELECT * from funciones_roles where rolescod = :rolescod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "rolescod"=> $rolescod
            )
        );
        return $row;
    }
}