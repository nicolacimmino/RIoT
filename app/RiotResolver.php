<?php
/**
 * Created by PhpStorm.
 * User: nicola
 * Date: 18/07/2015
 * Time: 14:20
 */

namespace App;


class RiotResolver {

    private $servers = [
        'iothttp1.app',
        'iothttp2.app',
        'iothttp3.app'
    ];

    public function resolve($serviceId)
    {
        // Very rough DHT implementation. Works only uo to 255 servers.
        $dhtIndex = hexdec(substr(md5($serviceId), 0, 2)) % count($this->servers);
        $server = $this->servers[$dhtIndex];
        return $server;
    }

}