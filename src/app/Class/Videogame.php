<?php

namespace Matomas\Netflixsemi\Class;

use Matomas\Netflixsemi\Class\Content;
use Matomas\Netflixsemi\Enum\VideogamePlatforms;

class Videogame extends Content
{

    private int $players;
    private VideogamePlatforms $platform;

    private bool $online;

}