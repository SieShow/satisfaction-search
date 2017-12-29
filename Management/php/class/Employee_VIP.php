<?php 
include_once 'Employee.php';

class Employee_VIP extends Employee{

    function __construct($idVIP){
        $data = loadDataFromVIP($idVIP, "employee");
        parent::__construct($data["idemployee"]);
    }
}
?>