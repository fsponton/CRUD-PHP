<?php
declare(strict_types=1);


class Alumnos_controller {
    //Listar alumnos
    public static function get() {
        $sentencia=Flight::db()->prepare("SELECT * FROM `alumnos`");
        $sentencia->execute();
        $datos=$sentencia->fetchAll();
        Flight::json($datos);
    }
    
    //Agregar alumno
    public static function add(){
        $nombres=(Flight::request()->data->nombres);
        $apellidos=(Flight::request()->data->apellidos);


        $sql="INSERT INTO alumnos (nombres,apellidos) VALUES (?,?)";
        $sentencia=(Flight::db()->prepare($sql));
        $sentencia->bindParam(1,$nombres);
        $sentencia->bindParam(2,$apellidos);
        
        $sentencia->execute();

        Flight::jsonp(['alumno agregado']);
    }

    //Borrar alumno
    public static function borrar(){
        $id=(Flight::request()->data->id);
      
        $sql="DELETE FROM alumnos WHERE id=?";
        $sentencia=(Flight::db()->prepare($sql));
        $sentencia->bindParam(1,$id);
        $sentencia->execute();

        Flight::jsonp(['alumno borrado']);
    }

    //actualizar alumno
    public static function update(){
        $id=(Flight::request()->data->id);
        $nombres=(Flight::request()->data->nombres);
        $apellidos=(Flight::request()->data->apellidos);


        $sql="UPDATE alumnos SET nombres=?, apellidos=? WHERE id=?";
        $sentencia=(Flight::db()->prepare($sql));
        $sentencia->bindParam(1,$nombres);
        $sentencia->bindParam(2,$apellidos);
        $sentencia->bindParam(3,$id);
        
        $sentencia->execute();

        Flight::jsonp(['alumno actualizado']);
    }

    //obtener alumno segun id
    public static function getById($id){
        $sql="SELECT * FROM alumnos WHERE id=?";
        $sentencia=(Flight::db()->prepare($sql));
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $datos=$sentencia->fetchAll();
        Flight::json($datos);
    }
}

