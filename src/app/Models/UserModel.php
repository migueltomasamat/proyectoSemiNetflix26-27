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

    public static function saveUser(User $user):bool{

        $conexion="";
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=netflix",
            "miguel",
            "leugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }

        $sql="INSERT INTO user (name,birthdate,email,password,role) 
                values(:nom,STR_TO_DATE(:fecha,'%Y-%m-%d'),:correo,:pass,:rol)";
        $stmt = $conexion->prepare($sql);

        $stmt->bindValue("nom",$user->getName());
        $stmt->bindValue("fecha",$user->getBirthdate()->format('Y-m-d'));
        $stmt->bindValue("correo",$user->getEmail());
        $stmt->bindValue("pass",$user->getPassword());
        $stmt->bindValue("rol",$user->getRole()->toString());

        $stmt->execute();

        if ($stmt->rowCount()){
            return true;
        }else{
            return false;
        }




    }
    public static function getUser(int $id):User{

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

        $sql="SELECT * from user where id=:id";
        $stmt=$conexion->prepare($sql);

        $stmt->bindValue("id",$id);

        //Ejecutar la consulta contra la BD
        $stmt->execute();

        //Convertir los resultados a un array de instancias de tipo User
        $resultados= $stmt->fetch(PDO::FETCH_ASSOC);

        return User::createFromArray($resultados);
    }

    public static function updateUser(User $user):bool{

        $conexion="";
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=netflix",
                "miguel",
                "leugim");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }

        $sql="UPDATE user SET name=:nom,birthdate=STR_TO_DATE(:fecha,'%Y-%m-%d'),
                email=:correo,password=:pass,role=:rol WHERE id=:id";
        $stmt = $conexion->prepare($sql);

        $stmt->bindValue("nom",$user->getName());
        $stmt->bindValue("fecha",$user->getBirthdate()->format('Y-m-d'));
        $stmt->bindValue("correo",$user->getEmail());
        $stmt->bindValue("pass",$user->getPassword());
        $stmt->bindValue("rol",$user->getRole()->toString());
        $stmt->bindValue("id",$user->getId(),PDO::PARAM_INT);

        $stmt->execute();

        if ($stmt->rowCount()){
            return true;
        }else{
            return false;
        }




    }



}