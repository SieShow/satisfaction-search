 <?php
 session_start();
$error='';
if(isset($_POST['btnlogin'])){
    if($_POST['login'] != "JABÁ"){
        $_SESSION['login'] = $_POST['login'];
        header('location:../management/Pages/main.php');
        }
else{
    $error="Usuário inválido";
}
}
?>