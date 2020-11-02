<?php
declare(strict_types = 1);

namespace App\Helpers\ImageServer;

use League\Glide\Server;

class ImageServer
{
    private $server;
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function getServer():Server
    {
        return $this->server;
    }
}