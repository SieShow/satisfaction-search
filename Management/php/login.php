<?php
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
        $connection = mysqli_connect("localhost", "root","",satisfactionbd);
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
            header('location:Pages/main.php');
        }
        else{
            $sql = "SELECT idusers from users where name = '$user'";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $erro = "Senha incorreta";
            }
            else{
            $error="Usuário não cadastrado";
        }
    }
        $connection->close();
    }
}
?>