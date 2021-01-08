<?php
declare(strict_types=1);

namespace Tests\Salary;

use App\Salary\Salary;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
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

    public function testAddTax()
    {
        $salary = new Salary(100, 10);
        $delta = 5;
        $description = 'new tax';
        $newSalary = $salary->addTax($delta, $description);

        $this->assertInstanceOf(Salary::class, $newSalary);
        $this->assertEquals($salary->getTax() + $delta, $newSalary->getTax());
        $log = $newSalary->getLog();
        $this->assertCount(1, $log);
        $this->assertStringContainsString($description, $log[0]);
    }

    public function testSubtractTax()
    {
        $salary = new Salary(100, 10);
        $delta = 5;
        $newSalary = $salary->subtractTax($delta, 'remove tax');

        $this->assertInstanceOf(Salary::class, $newSalary);
        $this->assertEquals($salary->getTax() - $delta, $newSalary->getTax());
    }

}
