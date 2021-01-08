<?php
declare(strict_types=1);

namespace App\Salary\Rules;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;

class KidsRule implements RuleInterface
{
    public function handle(Salary $initialSalary, EmployeeParameters $parameters): Salary
    {
        if ($parameters->getKids() > 2) {
            return $initialSalary->subtractTax(2, 'has more then 2 children');
        }

        return $initialSalary;
    }
}
