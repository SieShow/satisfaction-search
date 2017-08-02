<?php
class user{
    public $user_name;
    public $password;

    function Login(){
         session_start();
        $error='';
        if(isset($_POST['btnlogin'])){
    if($_POST['login'] != "JABÁ"){
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_SESSION['password'];
        header('location:../management/Pages/main.php');
        }
else{
    $error="Usuário inválido";
}
}
    }
}
?>