<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\EmployeeParameters;
use App\Salary\Rules\AgeRule;
use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class AgeRuleTest extends TestCase
{
    private Salary $initialSalary;
    private AgeRule $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $initialGross = 1000;
        $initialTax = 0;
        $this->initialSalary = new Salary($initialGross, $initialTax);
        $this->rule = new AgeRule();
    }

    public function testBigAge()
    {
        $salary = $this->rule->handle($this->initialSalary, new EmployeeParameters(51));

        $this->assertEquals($this->initialSalary->getGross() * 1.07, $salary->getGross());
        $this->assertEquals($this->initialSalary->getTax(), $salary->getTax());
    }

    public function testSmallAge()
    {
        $salary = $this->rule->handle($this->initialSalary, new EmployeeParameters(20));

        $this->assertEquals($this->initialSalary->getGross(), $salary->getGross());
        $this->assertEquals($this->initialSalary->getTax(), $salary->getTax());
    }

}
