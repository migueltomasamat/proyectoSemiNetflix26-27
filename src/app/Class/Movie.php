<?php

namespace Matomas\Netflixsemi\Class;

use Matomas\Netflixsemi\Class\Content;

class Movie extends Content
{

    private int $length;
    private string $director;
    private array $genere;

    public function __construct()
    {
        $this->genere=[];
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): Movie
    {
        $this->length = $length;
        return $this;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): Movie
    {
        $this->director = $director;
        return $this;
    }

    public function getGenere(): array
    {
        return $this->genere;
    }

    public function setGenere(array $genere): Movie
    {
        $this->genere = $genere;
        return $this;
    }



}