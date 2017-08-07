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
        <a href="" id="prof">Editar perfil</a>
        <a href="../PHP/Logout.php">Sair</a>
        </div>
        </div>
    <div id="menu">
        <div id="menuhorizontal">
        <ul>
            <li><a href="">Inicial</a></li>
            <li><a href="mainclientes.php">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            <li><a href="maingeral.php">Relatório geral</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div id="allblock">
        <div id="searchdiv">
    <input type="text" placeholder="Ache os clientes e funcionários !" name="pesquisa"/>
        </div>
    <table id="maintable">
        <thead id="thead">
        <td>Nome do cliente</td>
        <td>Avaliação média</td>
        <td>Funcionário solicitado</td>
        <td>Proporção resolução do problema(%)</td>
        </thead>
   <tbody id="tbody">
    <?php
    $colums = array("name","note_avarage","issue_sol_avarage");
     load("select * from employee", $colums);?>
    </tbody>
    </table>
    </div>
    <div id="conf">
    <div id="profileinfo">
        <img src="../Img/User-unknown.png">
        <button>Selecionar imagem</button>
        <label>Usuário</label>
        <input type="text" value="" />
        <label>Senha</label>
        <input type="password" value="" />
        <label>Confirma senha</label>
        <input type="password" value="" />
        <label>Email</label>
        <input type="text" value="" />
        <div>
        <button id="cancel">Cancelar</button>
        <button id="save">Salvar</button>
        </div>
    </div>
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
document.getElementById("prof").onclick = function(){
    document.getElementById('conf').style.display='block';
}

</script>
</body>
</html>