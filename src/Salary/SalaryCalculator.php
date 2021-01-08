<?php
declare(strict_types=1);

namespace App\Salary;

use App\Salary\Rules\RuleInterface;

final class SalaryCalculator
{
    /**
     * @var RuleInterface[]
     */
    private array $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function calculate(EmployeeParameters $employeeParameters, int $gross): Salary
    {
        $salary = new Salary($gross);
        foreach ($this->rules as $rule) {
            $salary = $rule->handle($salary, $employeeParameters);
        }
        return $salary;
    }
}
