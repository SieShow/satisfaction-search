<?php 
include_once 'Customer.php';

class Customer_VIP extends Customer{

    function __construct($idVIP){
        $data = loadDataFromVIP($idVIP, "customer");
        parent::__construct($data["idcustomer"]);
    }
}
?>