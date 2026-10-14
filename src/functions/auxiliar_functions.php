<?php
declare(strict_types=1);
const DIGITS=[1,2,3,4,5,6,7,8,9,0];
const CHARACTERS = ['A','B','C','D','E','F','H','I'];
const SPECIAL = [';','.','-','!','?'];

const ELEMENTS = [DIGITS,CHARACTERS,SPECIAL];


function generatePassword(int $long=16,bool $digits=true,bool $characters=true,bool $special=true):string{

    $password ="";
    if (!$digits && !$characters && !$special) {
        $characters = true;
    }
    //Tengo que generar 16 combinaciones de digitos, caracteres y especiales
    while(strlen($password)<=$long){
        //Tengo que seleccionar uno de esos tres tipos o de los tipos que me hayan pasado por parámetro
        $seleccionado = mt_rand(0, 2);
        if ($seleccionado === 0 and $digits === true) {
            $password .= ELEMENTS[$seleccionado][mt_rand(0, count(ELEMENTS[$seleccionado])-1)];
        } else if ($seleccionado === 1 and $characters === true) {
            $password .= ELEMENTS[$seleccionado][mt_rand(0, count(ELEMENTS[$seleccionado])-1)];
        } else if ($seleccionado === 2 and $special === true) {
            $password .= ELEMENTS[$seleccionado][mt_rand(0, count(ELEMENTS[$seleccionado])-1)];
        }
    }
    return $password;
    }


//generatePassword(32,true,true,false);
//generatePassword();
//generatePassword(64,false);
