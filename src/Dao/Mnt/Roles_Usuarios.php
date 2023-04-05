<?php
namespace Dao\Mnt;

/*
CREATE TABLE `roles_usuarios` (
  `usercod` bigint(10) NOT NULL,
  `rolescod` varchar(15) NOT NULL,
  `roleuserest` char(3) DEFAULT NULL,
  `roleuserfch` datetime DEFAULT NULL,
  `roleuserexp` datetime DEFAULT NULL,
*/
use Dao\Table;


class Roles_Usuario extends Table{
    
    public static function insert(string $rolescod ,string $roleuserest, string $roleuserexp): int
    {
        $date = new \DateTime("now");
        $date2 =  date_add($date, date_interval_create_from_date_string("30 days"));
        $sqlstr = "INSERT INTO roles (rolescod,roleuserest,roleuserexp) values(:rolescod,:roleuserest,:roleuserexp);";
        $rowsInserted = self::executeNonQuery(
            $sqlstr,
            array("rolescod"=>$rolescod, "roleuserexp"=>$roleuserexp, "roleuserest"=>$roleuserest)
        );
        return $rowsInserted;
    }
    public static function update(string $rolescod ,string $rolesdsc, string $rolesest){
        $sqlstr = "UPDATE roles_usuario set roleuserest = :roleuserest, roleuserexp = :roleuserexp where rolescod=:rolescod;";
        $rowsUpdated = self::executeNonQuery(
            $sqlstr,
            array(
                "roleuserest" => $rroleuserest,
                "roleuserexp" => $roleuserexp,
                "rolescod" => $rolescod
            )
        );
        return $rowsUpdated;
    }
    public static function delete(string $rolescod){
        $sqlstr = "DELETE from roles_usuario where rolescod=:rolescod;";
        $rowsDeleted = self::executeNonQuery(
            $sqlstr,
            array(
                "rolescod" => $rolescod
            )
        );
        return $rowsDeleted;
    }
    public static function findAll(){
        $sqlstr = "SELECT * from roles_usuario;";
        return self::obtenerRegistros($sqlstr, array());
    }
    public static function findByFilter(){

    }
    public static function findById(string $rolescod){
        $sqlstr = "SELECT * from roles where rolescod = :rolescod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "rolescod"=> $rolescod
            )
        );
        return $row;
    }
}