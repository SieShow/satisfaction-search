<?php
function LoginValidation(){	
session_start();
if($_SESSION['login'] == null){
    header("location: ../index.php");
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