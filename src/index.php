<?php
    include_once "./vendor/autoload.php";

    use Phroute\Phroute\RouteCollector;
    use Matomas\Netflixsemi\Controllers\UserContoller;

    session_start();

    $router= new RouteCollector();

    //Rutas de usuario
    $router->get('/user/create',[UserContoller::class,'create']);
    $router->get('/user/{id}/edit',[UserContoller::class,'edit']);
    $router->get('/user/{id}',[UserContoller::class,'show']);
    $router->get('/user',[UserContoller::class,'index']);
    $router->post('/user',[UserContoller::class,'store']);
    $router->put('/user/{id}',[UserContoller::class,'update']);
    $router->delete('/user/{id}',[UserContoller::class,'destroy']);
    $router->delete('/user',[UserContoller::class,'wipeout']);


    //Login de usuario
    $router->get('/login',[UserContoller::class,'showLogin']);
    $router->post('/check-user',[UserContoller::class,'check']);
    $router->get('/logout',[UserContoller::class,'logout']);







    //Ejemplos vistos en clase
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
       include_once "app/Views/frontend/frontend.php";
    });

    $router->get('/password',function(){
        include_once "functions/auxiliar_functions.php";
        return generatePassword(32);
    });



    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $response;
