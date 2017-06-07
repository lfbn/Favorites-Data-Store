<?php

namespace FDS\helper;

class MongoDbHelper {

    /**
     * Builds a connection string to connect to a MongoDB instance.
     *
     * @param string $host
     * @param int $port
     * @param string $database
     * @param string $username
     * @param string $password
     * 
     * @return string
     */
    public static function buildConnectionString($host, $port, $database, $username = null, $password = null)
    {
        if (!is_int($port)) {
            throw new \InvalidArgumentException('The port provided should be an integer');
        }

        if (!empty($username) && !empty($password)) {
            $usernameAndPassConString = sprintf(
                '%s:%s@',
                $username,
                $password
            );
        } else {
            $usernameAndPassConString = '';
        }

        return sprintf(
            'mongodb://%s%s:%d/%s',
            $usernameAndPassConString,
            $host,
            $port,
            $database
        );
    }
}