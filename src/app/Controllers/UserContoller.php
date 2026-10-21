<?php

namespace Matomas\Netflixsemi\Controllers;

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
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}