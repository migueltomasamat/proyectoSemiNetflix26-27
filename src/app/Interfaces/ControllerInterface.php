<?php

namespace Matomas\Netflixsemi\Interfaces;

interface ControllerInterface
{

    //Todos los elementos de un tipo
    public function index();

    //Un elemento de un tipo
    public function show($id);

    //Me devolverá el formulario para crear un elemento
    public function create();

    //Guardará un elemento en la base de datos
    public function store();

    //Devolvera un formulario con los datos de un elemento para modificarlo
    public function edit($id);

    //Modificará los datos de un elemento
    public function update($id);

    //Borrará un elemento de la base de datos
    public function destroy($id);


}