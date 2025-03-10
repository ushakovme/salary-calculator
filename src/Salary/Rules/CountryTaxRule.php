<?php
declare(strict_types=1);

namespace App\Salary\Rules;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;

class CountryTaxRule implements RuleInterface
{
    public function handle(Salary $initialSalary, EmployeeParameters $parameters): Salary
    {
        return $initialSalary->addTax(20, 'country tax');
    }
}
