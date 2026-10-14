<?php

namespace Matomas\Netflixsemi\Class;

use Matomas\Netflixsemi\Enum\UserRole;
use DateTime;

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






}