<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\EmployeeParameters;
use App\Salary\Rules\CountryTaxRule;
use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class CountryTaxRuleTest extends TestCase
{
    private Salary $initialSalary;
    private CountryTaxRule $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $initialGross = 1000;
        $initialTax = 0;
        $this->initialSalary = new Salary($initialGross, $initialTax);
        $this->rule = new CountryTaxRule();
    }

    public function testAddsTax()
    {
        $params = new EmployeeParameters();

        $salary = $this->rule->handle($this->initialSalary, $params);

        $this->assertEquals($this->initialSalary->getGross(), $salary->getGross());
        $this->assertEquals($this->initialSalary->getTax() + 20, $salary->getTax());
    }

}
