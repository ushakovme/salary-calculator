<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    public function testSetsTax()
    {
        $initialTax = 0;
        $salary = new Salary(5, $initialTax);

        $this->assertEquals($initialTax, $salary->getTax());

        $newTax = 50;
        $salary = $salary->setTax($newTax);
        $this->assertEquals($newTax, $salary->getTax());
    }


    public function testAddGross()
    {
        $salary = new Salary(100);
        $delta = 50;
        $description = 'new year bonus';
        $newSalary = $salary->addGross($delta, $description);

        $this->assertInstanceOf(Salary::class, $newSalary);
        $this->assertEquals($salary->getGross() + $delta, $newSalary->getGross());
        $log = $newSalary->getLog();
        $this->assertCount(1, $log);
        $this->assertStringContainsString($description, $log[0]);
    }

    public function testSubtractGross()
    {
        $salary = new Salary(100);
        $delta = 50;
        $newSalary = $salary->subtractGross($delta, 'deduction');

        $this->assertInstanceOf(Salary::class, $newSalary);
        $this->assertEquals($salary->getGross() - $delta, $newSalary->getGross());
    }

}
