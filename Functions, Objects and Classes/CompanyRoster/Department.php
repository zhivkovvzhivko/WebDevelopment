<?php

class Department
{
    private $name;
    private $employees;

    /**
     * Department constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->employees = [];
    }

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function avgSalary(): float
    {
        $sum = 0;
        foreach ($this->getEmployees() as $employee) {
            $sum += $employee->getSalary();
        }

        return $sum / count($this->getEmployees());
    }
}
