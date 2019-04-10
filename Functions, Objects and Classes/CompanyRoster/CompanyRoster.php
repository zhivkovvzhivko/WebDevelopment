<?php

require_once('Employee.php');
require_once('Department.php');

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
