<?php
session_start();
$error ='';
if(isset($_POST['btnlogin'])){
 if ($_POST['login'] != null) {
        $user = $_POST['login'];
        $pass = $_POST['passw'];
        $sql = "select login from users where login='$user' and password='$pass'";
        $connection = mysqli_connect("localhost", "root", "123", "satisfactionbd");
        if(!$connection){
        die("Parece que encontramos algum problema em conectar com o banco de dados :(");
   }
        $result = $connection->query($sql);
        if($result->num_rows > 0){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['passw'];
            header('location:../management/Pages/main.php');
        }
        else{
            $error="Usuário inválido";
        }
        $connection->close();
    }
}
?>