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
            $additional = $initialSalary->getGross() * 0.07;
            return $initialSalary->addGross($additional, 'age is bigger than 50');
        }

        return $initialSalary;
    }
}
