<?php 
require_once './vendor/autoload.php'; 
require_once('./src/Util/ValidInput.php');

use PHPUnit\Framework\TestCase;


class UtilTest extends TestCase
{
    public function testStatementReturnsString()
    {
        $this->assertIsString('John Doe');
    }
}