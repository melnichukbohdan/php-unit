<?php

namespace Tests;


use App\SalaryCalculator;
use PHPUnit\Framework\TestCase;

class SalaryCalculatorTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testCalculate(float $salary, float $expected): void
    {
        $salaryCalculator = new SalaryCalculator();
        $result = $salaryCalculator->calculate($salary);

        self::assertEquals($expected, $result);
    }

    public static function dataProvider():array
    {
        return [
            [
                10,9
            ],
            [
                20,18
            ],
            [
                25.4,22.86
            ],
            [
                45.45,40.91
            ],
        ];
    }

}
