<?php

namespace Matomas\Netflixsemi\Class;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Content
{
    protected UuidInterface $uuid;
    protected string $name;
    protected \DateTime $expiredate;

    protected $rating;

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(UuidInterface $uuid): Content
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Content
    {
        $this->name = $name;
        return $this;
    }

    public function getExpiredate(): \DateTime
    {
        return $this->expiredate;
    }

    public function setExpiredate(\DateTime $expiredate): Content
    {
        $this->expiredate = $expiredate;
        return $this;
    }




}