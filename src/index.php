<?php
    include_once "./vendor/autoload.php";

    use Phroute\Phroute\RouteCollector;

    $router= new RouteCollector();

    $router->get('/admin',function (){
       include_once "app/Views/backend/backend.index.php";
    });

    $router->get('/peliculas',function(){
        return "Listado de peliculas";
    });

    $router->get('/get-uuid',function(){
        return \Ramsey\Uuid\Uuid::uuid4();
    });

    $router->get('ejemplo1',function(){
        include_once "ejemplos/ejemplo1.php";
    });

    $router->get('/',function(){
       include_once "app/Views/frontend/frontend.html";
    });



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $response;
