<?php

namespace FDS;

use FDS\helper\MongoDbHelper;

class Database {

    private $host;

    private $port;

    private $username;

    private $password;

    private $database;

    private $collection;

    public function __construct($host, $port, $username, $password, $database, $collection) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->collection = $this
            ->connect()
            ->selectCollection($database, $collection);
    }

    public function insert($data) {
        return $this->collection->insert($data);
    }

    public function find($filter) {
        return $this->collection->find($filter);
    }

    public function remove($filter) {
        return $this->collection->remove($filter);
    }

    private function connect() {
        if (!class_exists('Mongo')) {
            throw new \Exception('The MongoDB PECL extension has not been installed or enabled');
        }

        try {
            $mongoClient = new \MongoClient(
                MongoDbHelper::buildConnectionString(
                    $this->username,
                    $this->password,
                    $this->host,
                    $this->port,
                    $this->database
                )
            );
        } catch (\Exception $e) {
            throw new Exception('The Mongo Client was not correctly instantiated');
        }        

        return $mongoClient;
    }
}