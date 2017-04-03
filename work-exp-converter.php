<?php

class WorkExpConverter {
  function convert() {
    return true;
  }

  function getStartDate($input) {
    $pattern = '/\(([a-zA-Z0-9 ]*) [–-]{1}/';
    preg_match($pattern, $input, $startDate);
    return $startDate[1];
  }

  function getEndDate($input) {
    $pattern = '/[–-]{1} ([a-zA-Z0-9]*)\)$/';
    preg_match($pattern, $input, $endDate);
    return $endDate[1];
  }
}

use PHPUnit\Framework\TestCase;

class WorkExpConverterTest extends TestCase {

  public function testStartDateYearEnDash() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "2002";
      $actual = WorkExpConverter::getStartDate($input);
      $this->assertEquals($actual, $expected);
  }

  public function testStartDateYearHyphen() {
      $input = "Aim 1999 (2002 - Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "2002";
      $actual = WorkExpConverter::getStartDate($input);
      $this->assertEquals($actual, $expected);
  }

  public function testEndDatePresemtHyphen() {
      $input = "Aim 1999 (2002 - Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Present";
      $actual = WorkExpConverter::getEndDate($input);
      $this->assertEquals($actual, $expected);

  }

  public function testConvertYearToPresent() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (2002 - Present)";
      $actual = WorkExpConverter::convert($input);
      $this->assertEquals($actual, $expected);
  }
}
