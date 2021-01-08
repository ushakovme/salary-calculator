<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    public function testSetsGross()
    {
        $initialGross = 100;
        $salary = new Salary($initialGross);

        $this->assertEquals($initialGross, $salary->getGross());

        $newGross = 200;
        $salary = $salary->setGross($newGross);
        $this->assertEquals($newGross, $salary->getGross());
    }

    public function testSetsTax()
    {
        $initialTax = 0;
        $salary = new Salary(5, $initialTax);

        $this->assertEquals($initialTax, $salary->getTax());

        $newTax = 50;
        $salary = $salary->setTax($newTax);
        $this->assertEquals($newTax, $salary->getTax());
    }

    public function testImmutable()
    {
        $salary = new Salary(100);
        $newSalaryByGross = $salary->setGross(200);
        $newSalaryByTax = $salary->setTax(5);

        $this->assertInstanceOf(Salary::class, $newSalaryByGross);
        $this->assertNotEquals($salary, $newSalaryByGross);
        $this->assertNotEquals($salary, $newSalaryByTax);
    }

}
