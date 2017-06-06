<?php

use FDS\helper\MongoDbHelper;
use PHPUnit\Framework\TestCase;

class MongoDbHelperTest extends TestCase
{

    public function testWithUsernamePassEmpty()
    {
        $this->assertEquals(
            MongoDbHelper::buildConnectionString(                
                '127.0.0.1',
                80,
                'db',
                '',
                ''
            ),
            'mongodb://127.0.0.1:80/db'
        );       
    }

    public function testWithAllDataProvided()
    {
        $this->assertEquals(
            MongoDbHelper::buildConnectionString(                
                'localhost',
                90,
                'database',
                'user',
                'pass'
            ),
            'mongodb://user:pass@localhost:90/database'
        );       
    }
}