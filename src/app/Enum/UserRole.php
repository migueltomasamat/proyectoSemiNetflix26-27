<?php

namespace Matomas\Netflixsemi\Enum;

enum UserRole
{
    case ADMIN;
    case REGULAR;
    case EDITOR;

    public static function fromString(string $role):UserRole{

        $retorno= match (strtoupper($role)){
            "ADMIN"=>UserRole::ADMIN,
            "REGULAR"=>UserRole::REGULAR,
            "EDITOR"=>UserRole::EDITOR
        };

        return $retorno;
    }

    public function toString(): string
    {
        $retorno= match ($this){
            UserRole::ADMIN=>'ADMIN',
            UserRole::EDITOR=>'EDITOR',
            UserRole::REGULAR=>'REGULAR',
        };
        return $retorno;
    }

}
