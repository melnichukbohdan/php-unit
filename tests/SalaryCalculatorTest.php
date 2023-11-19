<?php

namespace Tests;


use App\SalaryCalculator;
use mysqli;
use PHPUnit\Framework\TestCase;

class SalaryCalculatorTest extends TestCase
{
    private $mysqli;

    private SalaryCalculator $salaryCalculator;
    public function setUp(): void
    {
        parent::setUp();
        $this->mysqli = new mysqli('localhost', 'phpunit', 'phpunit', 'phpunit');
        if ($this->mysqli->error) {
            echo $this->mysqli->error . PHP_EOL;
            exit(1);
        }

        $this->salaryCalculator = new SalaryCalculator();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->mysqli->close();
    }

    public function testCalculateSalary()
    {
        $this->mysqli->query('INSERT INTO account SET email = "", name = "", salary = 11');
        $accountId = $this->mysqli->insert_id;

        $result = $this->salaryCalculator->calculateSalary($accountId);

        self::assertEquals(9.9, $result);

    }

    /**
     * @dataProvider dataProvider
     */
    public function testCalculate(float $salary, float $expected): void
    {
        $result = $this->salaryCalculator->calculate($salary);

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
