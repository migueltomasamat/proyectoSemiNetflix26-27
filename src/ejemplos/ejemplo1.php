<?php

$variable='Contenido de var 1';
$variable2=15;
$variable3=16.4;
$variable=false;

echo "El valor es: $variable</br>";
echo '$varible3</br>';

print "Esto es para mostrar un mensaje por pantalla";

$variable5="Esto es una cadena"." y esto es otra";


$array = array();
$array = [
    "clave1"=>"valor1",
    "clave2"=>4,
    "clave3"=>[1,2,3],
    "clave4"=>["subclave1"=>"subvalor1","subclave2"=>"subvalor2"]
];

var_dump($array);

var_dump($_GET);


//echo "He recibido un parametro con valor". $_GET['param1'];
if(isset($_GET['param1'])){
    echo "He recibido un parametro con valor". $_GET['param1'];
}else{
    echo "No me ha llegado ningún parámetro";
}

















