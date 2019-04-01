<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email
    private $age;

    /**
     * Employee constructor.
     * @param $name
     * @param $salary
     * @param $position
     * @param $department
     * @param $email
     * @param $age
     */
    public function __construct(string $name, float $salary, string $position,
                                string $department, string $email = 'n/a', int $age = -1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        $salaryFormat = number_format($this->getSalary(), 2);
        return "{$this->getName()} {$salaryFormat} {$this->getEmail()} {$this->getAge()}\n";
    }
}

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

$n = intval(readline());

$departments = [];

while ($n-- > 0) {
    $input = explode('', readline());

    $employeeName = $input[0];
    $employeeSalary = floatval($input[1]);
    $employeePosition = $input[2];
    $departmentName = $input[3];
    $employee = null;

    if (count($input) == 4) {
        $employee = new Employee($employeeName, $employeeSalary, $employeePosition, $departmentName);
    } elseif (count($input) == 5) {
        if (is_numeric($input[4])) {
            $employee = new Employee($employeeName, $employeeSalary, $employeePosition, $departmentName,
                "n/1", intval($input[4]));
        } else {
            $employee = new Employee($employeeName, $employeeSalary, $employeePosition, $departmentName,
                $input[4]);
        }
    } else {
        $employee = new Employee($employeeName, $employeeSalary, $employeePosition, $departmentName,
            $input[4], $input[5]);
    }

    if (!array_key_exists($departmentName, $departments)) {
        $department = new Department($departmentName);
        $departments[$departmentName] = $department;
    }

    $departments[$departmentName]->addEmployee($employee);
}

usort($departments, function (Department $d1, Department $d2){
    $d2->avgSalary() <=> $d1->avgSalary();
});

$departmentNameKey = $departments[0]->getName();
$firstDepartment = $departments[0]->getEmployees();

usort($firstDepartment, function (Employee $e1, Employee $e2){
    return $e2->getSalary() <=> $e1->getSalary();
});

echo "Highest Average Salary: {$departmentNameKey}\n";
foreach ($firstDepartment as $employee){
    echo $employee;
}

