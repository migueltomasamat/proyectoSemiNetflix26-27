<?php

namespace Matomas\Netflixsemi\Class;

use Matomas\Netflixsemi\Enum\UserRole;
use DateTime;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;
use Respect\Validator as v;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private UserRole $role;
    private DateTime $birthdate;

    private array $watched;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param UserRole $role
     * @param DateTime $birthdate
     * @param array $watched
     */
    public function __construct()
    {
        $this->watched=[];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): UserRole
    {
        return $this->role;
    }

    public function setRole(UserRole $role): User
    {
        $this->role = $role;
        return $this;
    }

    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    public function setBirthdate(DateTime $birthdate): User
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getWatched(): array
    {
        return $this->watched;
    }

    public function setWatched(array $watched): User
    {
        $this->watched = $watched;
        return $this;
    }

    public static function createFromArray(array $userData):User{

        $usuario = new User();

        if (isset($userData['id'])){
            $usuario->setId($userData["id"]);
        }

        $usuario->setName($userData["name"]);
        $usuario->setEmail($userData["email"]);
        $usuario->setPassword(password_hash($userData["password"],PASSWORD_DEFAULT));
        $usuario->setRole(UserRole::fromString($userData["role"]));
        $usuario->setBirthdate(DateTime::createFromFormat('Y-m-d',$userData["birthdate"]));

        return $usuario;
    }

    public static function createMultipleUsersFromArray(array $usersData):array{
        $usuarios=[];
        foreach ($usersData as $datosUsuario){
            $usuarios[]=User::createFromArray($datosUsuario);
        }
        return $usuarios;
    }

    public static function validateUserCreation(array $userData):array|true{

        try {
            Validator::key('name', Validator::stringType())->
            key('email', Validator::email())->
            key('password', Validator::stringType()->length(6,32))->
            key('role', Validator::stringType())->
            key('birthdate', Validator::date(), false)->assert($userData);
        }catch(NestedValidationException $e){
            return $e->getMessages();
        }
        return true;

    }

    public static function validateUserEdition(array $userData):array|true{

        try {
            Validator::key('name', Validator::stringType(),false)->
            key('email', Validator::email(),false)->
            key('password', Validator::stringType()->length(6,32),false)->
            key('role', Validator::stringType(),false)->
            key('birthdate', Validator::date(), false)->
            key('id',Validator::intVal())
            ->assert($userData);
        }catch(NestedValidationException $e){
            return $e->getMessages();
        }
        return true;
    }
    public static function updateFromArray(User $oldUser,array $newData):User{

        $oldUser->setName($newData["name"]??$oldUser->getName());
        $oldUser->setEmail($newData["email"]??$oldUser->getEmail());

        if (isset($newData['password'])){
            $passcifrado = password_hash($newData['password'],PASSWORD_DEFAULT);
            $oldUser->setPassword($passcifrado);
        }


        if (isset($newData['role'])){
            $oldUser->setRole(UserRole::fromString($newData["role"]));
        }
        if(isset($newData['birthdate'])){
            $oldUser->setBirthdate(DateTime::createFromFormat('Y-m-d',$newData["birthdate"]));
        }

        return $oldUser;
    }






}