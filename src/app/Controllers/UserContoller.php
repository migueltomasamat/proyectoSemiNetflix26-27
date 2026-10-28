<?php

namespace Matomas\Netflixsemi\Controllers;

use Matomas\Netflixsemi\Class\User;
use Matomas\Netflixsemi\Interfaces\ControllerInterface;
use Matomas\Netflixsemi\Models\UserModel;

class UserContoller implements ControllerInterface
{

    public function index()
    {
        //Tengo que consultar el modelo para obtener todos los usuarios de la base de datos
        $usuarios = UserModel::getAllUsers();
        //var_dump($usuarios);

        //Tengo que mostrar en una vista un listado de todos los usuarios que he obtenido en el punto anterior
        include_once "app/Views/backend/backend.user.index.php";
    }

    public function show($id)
    {

        return "ME han pedido el usuario $id";
        // TODO: Implement show() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        //Deberia recoger los datos y validarlos
        var_dump($_POST);
        $resultado=User::validateUserCreation($_POST);
        if (is_array($resultado)){
            foreach ($resultado as $error){
                echo $error;
            }
        }else{
            //Deberia guardarlos en la base de datos
            $newUser = User::createFromArray($_POST);
            if (UserModel::saveUser($newUser)){
                return "Se ha guardado bien el usuario";
            }else{
                return "No se ha guardado";
            }

        }

        //Deberia contestar algo, una vista o una respuesta en json


    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        $put=json_decode(file_get_contents("php://input"),true);

        $put['id']=$id;
        $resultado = User::validateUserEdition($put);
        if (is_array($resultado)){
            foreach ($resultado as $error){
                echo $error;
            }
        }else{
            $oldUser = UserModel::getUser($id);

            $newUser = User::updateFromArray($oldUser,$put);

            if (UserModel::updateUser($newUser)){
                return "Se ha actualizado";
            }else{
                return "No se ha actualizado";
            }
        }





    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}