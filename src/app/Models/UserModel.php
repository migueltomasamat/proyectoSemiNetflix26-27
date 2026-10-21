<?php

namespace Matomas\Netflixsemi\Models;

use Matomas\Netflixsemi\Class\User;
use PDO;
use PDOException;

class UserModel
{

    public static function getAllUsers():array{

        //Conexión a la base de datos
        $conexion="";
        try {
            $conexion = new PDO(
                "mysql:host=mariadb;dbname=netflix",
                "miguel",
                "leugim");

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

        //Prepara la consulta que se va a utilizar

        $sql="SELECT * from user";
        $stmt=$conexion->prepare($sql);

        //Ejecutar la consulta contra la BD
        $stmt->execute();

        //Convertir los resultados a un array de instancias de tipo User
        $resultados= $stmt->fetchAll(PDO::FETCH_ASSOC);

        return User::createMultipleUsersFromArray($resultados);
    }

}