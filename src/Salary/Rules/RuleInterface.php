<?php
declare(strict_types=1);

namespace App\Salary\Rules;

use App\Salary\EmployeeParameters;
use App\Salary\Salary;

interface RuleInterface
{
    public function handle(Salary $initialSalary, EmployeeParameters $parameters): Salary;
}
