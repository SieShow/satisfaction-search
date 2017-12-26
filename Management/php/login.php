<?php
include_once("class/Database.php");
session_start();
$error ='';
if(isset($_POST['btnlogin'])){
 if ($_POST['login'] != null) {
        $user = $_POST['login'];
        $pass = $_POST['passw'];
        $sql = "select idusers from users where name='$user' and password='$pass'";
        //Conexão normal
        //$connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
        //Conexão teste
        $connection = Database::getconnection();
        if($connection === false){
        header("location:Pages/conection_fail.html");
   }
        $result = $connection->query($sql);
        error_reporting(0);
        if($result->num_rows > 0){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['passw'];
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row['idusers'];
            header('location:pages/main.php');
        }
        else{
            $sql = "SELECT idusers from users where name = '$user'";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $error = "Senha incorreta";
            }
            else{
            $error="Usuário não cadastrado";
        }
    }
        $connection->close();
    }
}
?>