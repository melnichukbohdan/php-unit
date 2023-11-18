<?php

namespace App;

class SalaryCalculator
{
    public function calculate(float $salary): float
    {
        return round($salary * 0.9, 2);
    }

}