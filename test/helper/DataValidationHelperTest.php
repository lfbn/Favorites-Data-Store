<?php

use FDS\helper\DataValidationHelper;
use PHPUnit\Framework\TestCase;

class DataValidationHelperTest extends TestCase
{

    /**
     * @dataProvider positiveIntegerDataProvider
     */
    public function testValidatePositiveInteger($input, $expected)
    {
        $this->assertEquals(
            DataValidationHelper::validatePositiveInteger($input),
            $expected
        );       
    }

    /**
     * @dataProvider urlDataProvider
     */
    public function testValidateUrl($input, $expected)
    {
        $this->assertEquals(
            DataValidationHelper::validateUrl($input),
            $expected
        );       
    }

    public function positiveIntegerDataProvider()
    {
        return array(
            ['false', false],
            [1, true],
            [0, false]
        );
    }

    public function urlDataProvider()
    {
        return array(
            ['teste', false],            
            [0, false],
            ['http://www.google.com', true]
        );
    }
}