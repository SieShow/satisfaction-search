<?php
include_once "DataBaseQuerys.php";
session_start();
$result = '';
if(isset($_POST["btnchangepwd"]) && isset($_POST["passnew"]) && isset($_POST["passnewconfirm"]))
{
     $result = changepwd($_POST["passnew"], $_POST["passnewconfirm"],  $_SESSION["ID"]);
}
?>