<?php
namespace Dao\Mnt;
use Dao\Table;

class Zapatos extends Table{
    
    public static function insert(int $departamentocod, float $precio, string $zapatoest="ACT", string $imagenzapato, string $color,
                                  string $descripcion, string $detalles, string $nombrezapato): int
    {
        $sqlstr = "INSERT INTO zapatos (departamentocod, precio, zapatoest, imagenzapato, color, descripcion, detalles, nombrezapato) 
            values(:departamentocod, :precio, :zapatoest, :imagenzapato, :color, :descripcion, :detalles, :nombrezapato);";
        $rowsInserted = self::executeNonQuery(
            $sqlstr,
            array("departamentocod"=>$departamentocod, "precio"=>$precio, "zapatoest"=>$zapatoest, "imagenzapato" => $imagenzapato,
             "color"=>$color, "descripcion" => $descripcion, "detalles"=>$detalles, "nombrezapato" => $nombrezapato)
        );
        return $rowsInserted;
    }



    public static function update(int $zapatocod, 
                int $departamentocod, 
                float $precio, 
                string $zapatoest="ACT", 
                string $imagenzapato, 
                string $color,
                string $descripcion, 
                string $detalles, 
                string $nombrezapato
        ){
        $sqlstr = "UPDATE zapatos set departamentocod = :departamentocod, 
                    precio = :precio, 
                    zapatoest = :zapatoest, 
                    imagenzapato = :imagenzapato,
                    color = :color, 
                    descripcion = :descripcion, 
                    detalles = :detalles, 
                    nombrezapato = :nombrezapato where zapatocod=:zapatocod;";

        $rowsUpdated = self::executeNonQuery(
            $sqlstr,
            array("zapatocod" => $zapatocod, 
                "departamentocod"=>$departamentocod, 
                "precio"=>$precio, 
                "zapatoest"=>$zapatoest, 
                "imagenzapato"=>$imagenzapato,
                "color"=>$color,
                "descripcion" => $descripcion, 
                "detalles" => $detalles, 
                "nombrezapato" => $nombrezapato)

        );
        return $rowsUpdated;
    }
    public static function delete(int $zapatocod){
        $sqlstr = "DELETE from zapatos where zapatocod=:zapatocod;";
        $rowsDeleted = self::executeNonQuery(
            $sqlstr,
            array(
                "zapatocod" => $zapatocod
            )
        );
        return $rowsDeleted;
    }


    public static function findAll(){
        $sqlstr = "SELECT * from zapatos;";
        return self::obtenerRegistros($sqlstr, array());
    }



    public static function findByDepartment(int $departamentocod ){
        $sqlstr = "SELECT * FROM zapatos WHERE departamentocod = :departamentocod;";
        $row = self::obtenerRegistros(
            $sqlstr,
            array(
                
                "departamentocod" => $departamentocod
            )
        );
        return $row;
    }



    public static function findByBrand(int $marcacod, int $departamentocod ){
        $sqlstr = "SELECT * FROM zapatos WHERE marcacod = :marcacod and departamentocod = :departamentocod";
        $row = self::obtenerRegistros(
            $sqlstr,
            array(                
                "marcacod" => $marcacod,
                "departamentocod" => $departamentocod
            )
        );
        return $row;
    }

    public static function findByName(string $nombrezapato, int $departamentocod){
        $sqlstr = "SELECT * FROM zapatos where nombrezapato like '%".$nombrezapato."%' and departamentocod = :departamentocod;";
        $row = self::obtenerRegistros(
            $sqlstr,
            array(                
                "departamentocod" => $departamentocod                
            )
        );
        return $row;
    }



    public static function findById(int $zapatocod){
        $sqlstr = "SELECT * from zapatos where zapatocod = :zapatocod;";
        $row = self::obtenerUnRegistro(
            $sqlstr,
            array(
                "zapatocod"=> $zapatocod
            )
        );
        return $row;
    }
}