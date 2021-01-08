<?php
declare(strict_types=1);

namespace App\Salary\Rules;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;

class CompanyCarRule implements RuleInterface
{
    public function handle(Salary $initialSalary, EmployeeParameters $parameters): Salary
    {
        if ($parameters->usesCompanyCar()) {
            return $initialSalary->subtractGross(500, 'uses companies car');
        }

        return $initialSalary;
    }
}
