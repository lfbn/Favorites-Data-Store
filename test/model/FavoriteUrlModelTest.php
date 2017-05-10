<?php

use FDS\model\FavoriteUrlModel;
use PHPUnit\Framework\TestCase;

class FavoriteUrlModelTest extends TestCase
{

    public function testInstanceCreationThrowsExceptionOwnerInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new FavoriteUrlModel("test", 1);
    }

    public function testInstanceCreationThrowsExceptionUrlInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new FavoriteUrlModel(1, "test");
    }

    public function testInstanceCreation()
    {        
        $this->assertInstanceOf(FavoriteUrlModel::class, new FavoriteUrlModel(1, "http://www.google.com"));
    }
}