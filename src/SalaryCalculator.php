<?php

namespace App;

use mysqli;

class SalaryCalculator
{
    public function calculateSalary(int $accountId): float
    {
        $mysql = new mysqli('localhost', 'phpunit', 'phpunit', 'phpunit');
        if ($mysql->error) {
            echo $mysql->error . PHP_EOL;
            exit(1);
        }

        $result = $mysql->query('SELECT * FROM account WHERE id = ' . $accountId);
        $account = $result->fetch_assoc();
        if (!$account) {
            echo 'Account not found' . PHP_EOL;
            exit(1);
        }

        return $this->calculate($account['salary']);
    }

    public function calculate(float $salary): float
    {
        return round($salary * 0.9, 2);
    }

}