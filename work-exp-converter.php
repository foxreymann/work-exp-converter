<?php

function workExpConverter() {
  return true;
}

$converted = workExpConverter('ffff');
var_dump($converted);

use PHPUnit\Framework\TestCase;

class WorkExpConverterTest extends TestCase {

  public function testTrueIsTrue() {
      $foo = true;
      $this->assertTrue($foo);
  }

  public function testYearToPresent() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (2002 - Present)";
      $actual = workExpConverter($input);
      $this->assertEquals($actual, $expected);
  }
}
