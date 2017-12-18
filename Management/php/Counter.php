<?php
//Used in main.php
include('DataBaseQuerys.php');

function Customers(){
  echo GetNumberFromQuery("select count(*) from customer");

}

function Employee(){
  echo GetNumberFromQuery("select count(*) from employee");
 
}

function Forms(){
  echo GetNumberFromQuery("select count(*) from form");
}
?>