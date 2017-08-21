<?php
include('../PHP/tableload.php');
session_start();
if($_SESSION['login'] == null){
    header("location: ../index.php");
}
else{
    $user = $_SESSION['login'];
    $pass = $_SESSION['password'];
}
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../CSS/MainPageBonito.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <title>Gerenciamento</title>
</head>
<body>
    <div id="headpage">
        <div id="usernameoption">
        <img src="../Img/User-unknown.png" id="imgclick" >
        <div id="full-options-block">
            <div id="arrow">
                </div>
                <div id="userinfo">
                    <img src="../Img/User-unknown.png">
                    <label><?php echo $user ?></label>
                </div>     
        <a href="">Editar perfil</a>
        <a href="../PHP/Logout.php">Sair</a>
        </div>
        </div>
    <div id="menu">
        <div id="menuhorizontal">
        <ul>
            <li><a href="main.php">Inicial</a></li>
            <li><a href="">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            <li><a href="maingeral.php">Relatório geral</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div id="allblock">
        <div id="searchdiv">
    <input type="text" placeholder="Encontre todos os clientes !" name="pesquisa"/>
        </div>
    <table>
        <thead id="thead">
        <td>Nome do cliente</td>
        <td>Visitas registradas</td>
        <td>Formulários respondidos</td>
        <td>Avaliação média</td>
        <td>Proporção de problemas solucionados (%)</td>
        </thead>
   <tbody id="tbody">
    <?php
    $colums = array("name","tecnical_visits","forms_answereds");
     load("select name, tecnical_visits,forms_answereds from customer", $colums);?>
    </tbody>
    </table>
    </div>
<script>
var modal = document.getElementById('full-options-block');
var img = document.getElementById('imgclick');

document.onclick = function(e){
    if(e.target == img){
        if(modal.style.display == 'block'){
        modal.style.display = 'none';
    }
    else{
        modal.style.display = 'block';
    }
    }
    else{
          modal.style.display = 'none';
    }
}
</script>
</body>
</html>