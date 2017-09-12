<?php
include('SqlQuery.php');
function Customers(){
  echo RunQuery("select count(*) from customer");
}
function Employee(){
  echo RunQuery("select count(*) from employee");
}
function Forms(){
  echo RunQuery("select count(*) from form");
}
?>