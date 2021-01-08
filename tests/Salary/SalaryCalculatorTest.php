<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\EmployeeParameters;
use App\Salary\Rules\RuleInterface;
use App\Salary\Salary;
use App\Salary\SalaryCalculator;
use PHPUnit\Framework\TestCase;

class SalaryCalculatorTest extends TestCase
{
    public function testItReturnsSalary()
    {
        $calculator = new SalaryCalculator([]);
        $salary = $calculator->calculate(new EmployeeParameters(), 100);
        $this->assertInstanceOf(Salary::class, $salary);
    }

    public function testGrossDontChangeWithNoRules()
    {
        $calculator = new SalaryCalculator([]);
        $initialGross = 100;
        $salary = $calculator->calculate(new EmployeeParameters(), $initialGross);
        $this->assertEquals($initialGross, $salary->getGross());
    }

    public function testHandlingRules()
    {
        $rule = $this->createMock(RuleInterface::class);
        $rule
            ->expects($this->once())
            ->method('handle')
            ->willReturn(new Salary(5));

        $calculator = new SalaryCalculator([
            $rule
        ]);
        $calculator->calculate(new EmployeeParameters(), 100);
    }
}
