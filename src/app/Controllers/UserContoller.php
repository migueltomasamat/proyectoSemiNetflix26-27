<?php

namespace Matomas\Netflixsemi\Controllers;

use Matomas\Netflixsemi\Interfaces\ControllerInterface;

class UserContoller implements ControllerInterface
{

    public function index()
    {
        return "Estoy en el index de usuario";
        // TODO: Implement index() method.
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