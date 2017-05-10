<?php

use FDS\model\FavoriteIdModel;
use PHPUnit\Framework\TestCase;

class FavoriteIdModelTest extends TestCase
{    

    public function testInstanceCreationThrowsExceptionOwnerInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new FavoriteIdModel("test", 1);
    }

    public function testInstanceCreationThrowsExceptionIdInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new FavoriteIdModel(1, 0);
    }

    public function testInstanceCreation()
    {        
        $this->assertInstanceOf(FavoriteIdModel::class, new FavoriteIdModel(1, 1));
    }
}