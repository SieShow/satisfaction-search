<?php
session_start();
$user = $_SESSION['login'];
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset="utf-8" />
    <link href="../CSS/MainPageBonito.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <title>Gerenciamento</title>
</head>
<body>
    <div id="headpage">
        <div id="usernameoption">
        <img src="../Img/user_unknown.png" onclick="divVisibility()" >
        <div id="full-options-block">
            <div id="arrow">
                </div>
        <div class="options">
        <a href="">Alterar senha</a>
        </div>
        <div class="options">
        <a href="">Logout</a>
        </div>
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
    <input type="text" placeholder="Procure aqui !" name="pesquisa"/>
        </div>
    <table>
        <thead id="thead">
        <td>Nome do cliente</td>
        <td>Avaliação média</td>
        <td>Funcionário solicitado</td>
        <td>Proporção resolução do problema(%)</td>
        </thead>
   <tbody id="tbody">
    <tr>
        <td>lucas</td>
        <td>32</td>
        <td>Thiago</td>
        <td>56.5</td>
    </tr>
        <tr>
        <td>lucas</td>
        <td>32</td>
        <td>Thiago</td>
        <td>56.5</td>
    </tr>
        <tr>
        <td>lucas</td>
        <td>32</td>
        <td>Thiago</td>
        <td>56.5</td>
    </tr>
        <tr>
        <td>lucas</td>
        <td>32</td>
        <td>Thiago</td>
        <td>56.5</td>
    </tr>
    </tbody>
    </table>
    </div>
</body>
<script>
var modal = document.getElementById('full-options-block');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function divVisibility(){
    if(modal.style.display == 'block'){
        modal.style.display = 'none';
    }
    else{
        modal.style.display = 'block';
    }
}
</script>
</html>