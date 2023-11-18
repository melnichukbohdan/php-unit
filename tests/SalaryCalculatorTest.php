<?php

namespace Tests;


use App\SalaryCalculator;
use PHPUnit\Framework\TestCase;

class SalaryCalculatorTest extends TestCase
{
    public function testCalculate(): void
    {
        $salaryCalculator = new SalaryCalculator();
        $result = $salaryCalculator->calculate(10);

        self::assertEquals(8, $result);
    }

    public function testCalculateCase(): void
    {
        $salaryCalculator = new SalaryCalculator();
        $result = $salaryCalculator->calculate(20);

        self::assertEquals(16, $result);
    }
}
