<?php
declare(strict_types=1);

namespace App\Salary\Rules;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;

class AgeRule implements RuleInterface
{
    public function handle(Salary $initialSalary, EmployeeParameters $parameters): Salary
    {
        if ($parameters->getAge() > 50) {
            $gross = round($initialSalary->getGross() * 0.07, 2);
            return $initialSalary->setGross($gross);
        }

        return $initialSalary;
    }
}
