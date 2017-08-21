<?php
session_start();
error_reporting(0);
$msg = "";
if(isset($_POST['btnupdate'])){
    $userget = $_POST['newname'];
    $passget =  $_POST['newpass'];
    $confirmgetpass = $_POST['newpassconfirm'];

    if($userget != $_SESSION['login']){
        $sql = "UPDATE USERS SET name = '". $userget . "' WHERE iduser = " . $_SESSION['ID']."";
    }

    if($passget != null || $passget != ""){
        if($confirmgetpass != null || $confirmgetpass != ""){
            if($confirmgetpass == $passget){
                $sql = "UPDATE USERS set password = '". $passget . "' where iduser = " . $_SESSION['ID']."";
            }
            else{
                $msg = "As senhas não são iguais";
            }
        }
    }
}
?>