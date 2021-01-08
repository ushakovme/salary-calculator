<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;
use PHPUnit\Framework\TestCase;
use App\Salary\Rules\CompanyCarRule;

class CompanyCarRuleTest extends TestCase
{
    private Salary $initialSalary;
    private CompanyCarRule $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $initialGross = 1000;
        $initialTax = 10;
        $this->initialSalary = new Salary($initialGross, $initialTax);
        $this->rule = new CompanyCarRule();
    }

    public function testUsesCar()
    {
        $params = new EmployeeParameters();
        $params->setUsesCompanyCar(true);

        $salary = $this->rule->handle($this->initialSalary, $params);

        $this->assertEquals($this->initialSalary->getGross() - 500, $salary->getGross());
        $this->assertEquals($this->initialSalary->getTax(), $salary->getTax());
    }

    public function testNotUsesCar()
    {
        $params = new EmployeeParameters();
        $params->setUsesCompanyCar(false);

        $salary = $this->rule->handle($this->initialSalary, $params);

        $this->assertEquals($this->initialSalary->getGross(), $salary->getGross());
        $this->assertEquals($this->initialSalary->getTax(), $salary->getTax());
    }

}
