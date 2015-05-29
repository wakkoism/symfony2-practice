<?php

// src/Acme/TestBundle/Tests/Util/CalculatorTest.php
namespace Acme\TestBundle\Tests\Util;

use  Acme\TestBundle\Util\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);
        
        // Assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}

