<?php

include_once "../../../vendor/autoload.php";

use GuzzleHttp\Client;

class ItemProcessor extends modProcessor {
    /** @var Client */
    protected $client;

    public function initialize(): bool
    {
        $this->client = new Client([
            'base_uri' => 'http://go:8080/',
            'timeout'  => 30,
        ]);

        return parent::initialize();
    }

    public function process()
    {
        return $this->outputArray([], 0);
    }
}