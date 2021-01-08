<?php
declare(strict_types=1);

namespace App\Salary;

use DateTimeImmutable;

final class EmployeeParameters
{
    private int $age;
    private int $kids = 0;
    private bool $usesCompanyCar = false;
    private DateTimeImmutable $createdDt;

    public function __construct(int $age = 18, DateTimeImmutable $createdDt = null)
    {
        $this->age = $age;
        $this->createdDt = $createdDt ?? new DateTimeImmutable();
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getKids(): int
    {
        return $this->kids;
    }

    public function usesCompanyCar(): bool
    {
        return $this->usesCompanyCar;
    }

    public function getCreatedDt(): DateTimeImmutable
    {
        return $this->createdDt;
    }

    public function setKids(int $kids)
    {
        $this->kids = $kids;
    }

    public function setUsesCompanyCar(bool $usesCompanyCar)
    {
        $this->usesCompanyCar = $usesCompanyCar;
    }

    public function setCreatedDt(DateTimeImmutable $createdDt): void
    {
        $this->createdDt = $createdDt;
    }
}
