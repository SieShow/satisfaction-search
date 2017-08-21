<?php
session_start();
$error ='';
if(isset($_POST['btnlogin'])){
 if ($_POST['login'] != null) {
        $user = $_POST['login'];
        $pass = $_POST['passw'];
        $sql = "select idusers from users where name='$user' and password='$pass'";
        $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
        if(!$connection){
        header("location:Pages/conection_fail.html");
   }
        $result = $connection->query($sql);
        error_reporting(0);
        if($result->num_rows > 0){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['passw'];
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['idusers'];
            header('location:../management/Pages/main.php');
        }
        else{
            $error="Usuário inválido";
        }
        $connection->close();
    }
}
?>