<?php
function LoginValidation(){	
session_start();
if($_SESSION['login'] == null){
    header("location: ../index.php");
}
else{
    $user = $_SESSION['login'];
    $pass = $_SESSION['password'];
}
}
function ProfileValidation(){
    if($_GET["type"] == "e"){
    }
    else if($_GET["type"] == "c"){
    }
    else{
        header("location: main.php");
    }
}
?>