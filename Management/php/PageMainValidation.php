<?php
/**
 * Verifica se o usuários está logado
 */
function LoginValidation()
{	
session_start();

if($_SESSION['login'] == null)
{
    header("location: ../index.php");
    }
}
/**
 * Verifica o tipo de tabela que será carregado (Cliente/Funcionário)
 */
function ProfileValidation()
{
    if($_GET["type"] == "e"){
    }
    else if($_GET["type"] == "c"){
    }
    else{
        header("location: main.php");
    }
}
/**
 * Retorna a entitade que será carregada na página
 */
function getEntity($profile)
{
    if($_GET["type"] == "c"){
        include_once '../php/class/Customer.php';
        return new Customer($profile);
    }
    else {
        include_once '../php/class/Employee.php';
        return new Employee($profile);
    }
}
?>