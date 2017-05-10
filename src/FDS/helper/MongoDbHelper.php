<?php

namespace FDS\helper;

class MongoDbHelper {

    public static function buildConnectionString($username, $password, $host, $port, $database)
    {
        if ($username && $password) {
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