<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\EmployeeParameters;
use App\Salary\Rules\KidsRule;
use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class KidsRuleTest extends TestCase
{
    public function testHasManyKids()
    {
        $rule = new KidsRule();
        $initialGross = 1000;
        $initialSalary = (new Salary($initialGross))->setTax(10);

        $params = new EmployeeParameters(20);
        $params->setKids(5);

        $salary = $rule->handle($initialSalary, $params);

        $this->assertEquals($initialSalary->getTax() - 2, $salary->getTax());
        $this->assertEquals($initialSalary->getGross(), $initialGross);
    }

    public function testHasNoKids()
    {
        $rule = new KidsRule();
        $initialGross = 1000;
        $initialSalary = new Salary($initialGross);
        $initialSalary->setTax(10);

        $params = new EmployeeParameters(20);
        $params->setKids(0);

        $salary = $rule->handle($initialSalary, $params);

        $this->assertEquals($initialSalary->getTax(), $salary->getTax());
        $this->assertEquals($initialSalary->getGross(), $initialGross);
    }
}
