<?php


use App\MetricConverter;
use PHPUnit\Framework\TestCase;

class MetricConverterTest extends TestCase
{
    public function testConvertKilometersToMiles()
    {
        $converter = new MetricConverter();

        $this->assertEquals(12.43,$converter->kilometersToMiles(20));
    }

    public function testConvertCelsiusToFahrenheit()
    {
        $converter = new MetricConverter();

        $this->assertEquals(86,$converter->celsiusToFahrenheit(30));
        $this->assertEquals(98.6,$converter->celsiusToFahrenheit(37));
    }

    public function testKilogramToPound()
    {
        $converter = new MetricConverter();

        $this->assertEquals(176.37,$converter->kilogramToPound(80));
    }

    public function testLitersToGallons()
    {
        $converter = new MetricConverter();

        $this->assertEquals(13.21,$converter->litersToGallons(50,'US'));
        $this->assertEquals(13.20,$converter->litersToGallons(60,'UK'));

    }

}