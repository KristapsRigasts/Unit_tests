<?php

namespace App;

class MetricConverter
{
    public function kilometersToMiles($kilometers): float
    {
        return round($kilometers * 0.621371,2);
    }

    public function celsiusToFahrenheit($celsius): float
    {
        return $celsius * 1.8 + 32;
    }

    public function kilogramToPound($kilograms): float
    {
        return round($kilograms / 0.45359237,2);
    }

    public function litersToGallons($liters, $country): float
    {
        $gallons = 0;

        if($country === 'US')
        {
            $gallons = round($liters / 3.785411784,2);
        }
        if($country === 'UK')
        {
            $gallons = round($liters / 4.54609,2);
        }
        return $gallons;
    }


}