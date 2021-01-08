# Task
Here you need to build an application which can calculate the salary of employees.
We need to have an **expandable** system of bonuses or deductions.

### Explanation
- Country Tax for salaries is 20%
- If an employee older than 50 we want to add 7% to his salary
- If an employee has more than 2 kids we want to decrease his Tax by 2%
- If an employee wants to use a company car we need to deduct $500.

# Result
Rules contain all the logic for manipulation with salary. You can combine that rules, providing them to the salary calculator.
Order of the rules matters. 

Calculations are performed based on rules and employee parameters. 
Each operation adds a record to the salaries log, so that anyone can know how the calculations were done.

### Possible improvements
Use event sourcing

### Installation
1. Install the dependencies `composer install`

### Perform your own calculations
1. Edit `test.php`
2. Run `php tests.php`

### Run tests
Run:
`./vendor/bin/phpunit`

