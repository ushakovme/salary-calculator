<?php
declare(strict_types=1);

namespace App\Salary;


final class Salary
{
    private float $gross;
    private float $tax;
    private array $log = [];

    public function __construct(float $gross, float $tax = 0)
    {
        $this->gross = $gross;
        $this->tax = $tax;
    }

    public function getLog(): array
    {
        return $this->log;
    }

    private function addLogMessage(string $message)
    {
        $this->log[] = $message;
    }

    public function getGross(): float
    {
        return $this->gross;
    }

    public function addGross(float $delta, string $description): Salary
    {
        $newGross = $this->gross + $delta;
        $salary = $this->setGross($newGross);
        $salary->addLogMessage('Gross + ' . $delta . ': ' . $description);

        return $salary;
    }

    public function subtractGross(float $delta, string $description): Salary
    {
        $newGross = $this->gross - $delta;
        $salary = $this->setGross($newGross);
        $salary->addLogMessage('Gross - ' . $delta . ': ' . $description);

        return $salary;
    }

    private function setGross(float $gross): Salary
    {
        if ($gross < 0) {
            $gross = 0;
        }

        $salary = (clone $this);
        $salary->gross = $gross;
        return $salary;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function setTax(float $tax): Salary
    {
        if ($tax < 0) {
            $tax = 0;
        }

        if ($tax > 100) {
            $tax = 100;
        }

        $salary = (clone $this);
        $salary->tax = $tax;
        return $salary;
    }

    public function getNetPay(): float
    {
        return round($this->gross * (100 - $this->tax) / 100, 2);
    }
}
