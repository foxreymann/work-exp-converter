<?php

function workExpConverter() {
  return true;
}

$converted = workExpConverter('ffff');
var_dump($converted);

use PHPUnit\Framework\TestCase;

class StupidTest extends TestCase
{
public function testTrueIsTrue()
{
    $foo = true;
    $this->assertTrue($foo);
}
}
