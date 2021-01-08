<?php
declare(strict_types=1);

use App\Salary\EmployeeParameters;
use App\Salary\Rules\AgeRule;
use App\Salary\Rules\CompanyCarRule;
use App\Salary\Rules\CountryTaxRule;
use App\Salary\Rules\KidsRule;
use App\Salary\Salary;
use App\Salary\SalaryCalculator;

require 'vendor/autoload.php';

$printer = function (string $name, Salary $salary) {
    echo $name . ':' . PHP_EOL;
    echo '- Gross: ' . $salary->getGross() . PHP_EOL;
    echo '- Tax: ' . $salary->getTax() . '%' . PHP_EOL;
    echo '- Net pay: ' . $salary->getNetPay() . PHP_EOL;
    echo PHP_EOL;
};

$calculator = new SalaryCalculator([
    new CountryTaxRule(),
    new AgeRule(),
    new CompanyCarRule(),
    new KidsRule(),
]);

// Alice
$description = 'Alice is 26 years old, she has 2 kids and her salary is $6000';

$params = new EmployeeParameters(26);
$params->setKids(2);

$salary = $calculator->calculate($params, 6000);
$printer($description, $salary);

// Bob
$description = 'Bob is 52, he is using a company car and his salary is $4000';

$params = new EmployeeParameters(52);
$params->setUsesCompanyCar(true);

$salary = $calculator->calculate($params, 4000);
$printer($description, $salary);

// Charlie is 36, he has 3 kids, company car and his salary is $5000
$description = 'Charlie is 36, he has 3 kids, company car and his salary is $5000';

$params = new EmployeeParameters(36);
$params->setKids(3);
$params->setUsesCompanyCar(true);

$salary = $calculator->calculate($params, 5000);
$printer($description, $salary);
