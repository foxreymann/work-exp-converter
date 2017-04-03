<?php

class WorkExpConverter {
  function convert() {
    return true;
  }

  function getStartDate() {
    return "2002";
  }
}

use PHPUnit\Framework\TestCase;

class WorkExpConverterTest extends TestCase {

  public function testStartDateYear() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "2002";
      $actual = WorkExpConverter::getStartDate($input);
      $this->assertEquals($actual, $expected);
  }

  public function testConvertYearToPresent() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (2002 - Present)";
      $actual = WorkExpConverter::convert($input);
      $this->assertEquals($actual, $expected);
  }
}
