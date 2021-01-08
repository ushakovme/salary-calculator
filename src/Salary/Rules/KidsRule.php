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
            $tax = $initialSalary->getTax() - 2;
            return $initialSalary->setTax($tax);
        }

        return $initialSalary;
    }
}
