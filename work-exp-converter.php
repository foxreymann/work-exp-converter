<?php

class WorkExpConverter {
  function convert($input) {
    return self::stripDates($input).' ('.self::getStartDate($input).' - '.self::getEndDate($input).')';
  }

  function getStartDate($input) {
    $pattern = '/\(([a-zA-Z0-9 ]*) [–-]{1}/';
    preg_match($pattern, $input, $startDate);
    return $startDate[1];
  }

  function getEndDate($input) {
    $pattern = '/[–-]{1} ([a-zA-Z0-9 ]*)\)$/';
    preg_match($pattern, $input, $endDate);
    return $endDate[1];
  }

  function stripDates($input) {
    return preg_replace('/ \([^\)]*\)/', '', $input);
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

  public function testStartDateYearHyphenreplace() {
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

  public function testStripDates() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions";
      $actual = WorkExpConverter::stripDates($input);
      $this->assertEquals($actual, $expected);
  }

  public function testConvertYearToPresent() {
      $input = "Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (2002 - Present)";
      $actual = WorkExpConverter::convert($input);
      $this->assertEquals($actual, $expected);
  }

  public function testConvertMonthYearToPresent() {
      $input = "Aim 1999 (Jan 2002 – Present) / 2000 Plc (Jan 2005 – Present) / 2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)";
      $expected = "Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (Jan 2002 - Present)";
      $actual = WorkExpConverter::convert($input);
      $this->assertEquals($actual, $expected);
  }

  public function testConvertMonthYearToMonthYear() {
      $input = "Aim1999 (Nov 2010 – Feb 2012) / 2000 Plc (Sep 2010 – Apr 2015) / 2020-Vision (Jan 2011 – Jan 2016) / 1986Productions (2012 - Aug 2016)";
      $expected = "Aim1999 / 2000 Plc / 2020-Vision / 1986Productions (Nov 2010 - Aug 2016)";
      $actual = WorkExpConverter::convert($input);
      $this->assertEquals($actual, $expected);
  }
}
