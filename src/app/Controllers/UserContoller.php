<?php

namespace Matomas\Netflixsemi\Controllers;

use Matomas\Netflixsemi\Class\User;
use Matomas\Netflixsemi\Enum\UserRole;
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
        include_once "app/Views/backend/backend.user.create.php";
    }

    public function store()
    {
        //Deberia recoger los datos y validarlos
        $resultado=User::validateUserCreation($_POST);
        if (is_array($resultado)){
            foreach ($resultado as $error){
                echo $error;
            }
        }else{
            //Deberia guardarlos en la base de datos
            $newUser = User::createFromArray($_POST);
            if (UserModel::saveUser($newUser)){
                header('Location: /user');
            }else{
                return "No se ha guardado";
            }

        }

        //Deberia contestar algo, una vista o una respuesta en json


    }

    public function edit($id)
    {
        $usuario = UserModel::getUserById($id);

        include_once "app/Views/backend/backend.user.edit.php";

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
            $oldUser = UserModel::getUserById($id);

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
        //Comprobamos que el usuario está en la BD
        if (!UserModel::getUserById($id)){
            header("Content-Type: application/json");
            http_response_code(404);
            return json_encode([
                "error"=>true,
                "message"=>"No se ha encontrado el usuario",
                "code"=>404
            ]);
        }else{
            if(UserModel::destroyUser($id)){
                //Se ha destruido
                header("Content-Type: application/json");
                http_response_code(200);
                return json_encode([
                    "error"=>false,
                    "message"=>"Se ha destruido el usuario $id",
                    "code"=>200
                ]);

            }else{
                header("Content-Type: application/json");
                http_response_code(500);
                return json_encode([
                    "error"=>true,
                    "message"=>"La base de datos no funciona",
                    "code"=>500
                ]);
            }
        }

    }
    public function wipeout(){

        UserModel::destroyAllUsers();
    }

    public function showLogin(){

        include_once "app/Views/frontend/login.html";
    }

    public function check(){

        var_dump($_POST);
        $usuario=UserModel::getUserByEmail($_POST['email']);
        if (password_verify($_POST['password'],$usuario->getPassword())){
            //Usuario esta logeado
            $_SESSION['name']=$usuario->getName();
            $_SESSION['id']=$usuario->getId();
            $_SESSION['role']=$usuario->getRole()->toString();

            if ($usuario->getRole()===UserRole::ADMIN){
                header('Location: /admin');
            }else{
                header('Location: /');
            }

        }else{
            echo "No se ha podido logear al usuario";
        }
    }
    public function logout(){
        session_destroy();
        header('Location: /');
    }
}