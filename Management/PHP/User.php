<?php
include_once("Conection.php");

class User{
    
    private $user_id;
    public $name;
    private $password;
    private $perfilimg;
    private $usertype;
    public $error ='';

    static function CredencialsValidate($n, $p){
     Conectiontry();
       
    }

    function Login(){
        session_start();
        $error='';
        if($_POST['login'] != "JABÁ"){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_SESSION['password'];
            header('location:../management/Pages/main.php');
    }
    else{
    $error="Usuário inválido";
     }
}

    function logout(){
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        $user = null;
        $pasword = null;
        header('location: ../index.php');
    }
    function ChangePassword(){

    }

    function ChangePicture(){

    }

    function Search(){

    }
}
?>