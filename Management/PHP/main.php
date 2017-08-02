<!DOCTYPE HTML>
<?php 
if(isset($_POST["login"]) && isset($_POST["senha"])){
}
else{
    echo "<p>"$_POST["login"] "</p>";
}
?>
<HTML>
<head>
    <meta charset="utf-8" />
    <link href="../CSS/MainPageBonito.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <title>Gerenciamento</title>
<body>
    <div id="headpage">
        <div id="usernameoption">
        <form action="../index.html">
         <label><?php echo $login ?></label>
        <button>Logout</button>
        </form>
        </div>
    <div id="menu">
        <div id="menuhorizontal">
        <nav>
        <ul>
            <li><a href="">Inicial</a></li>
            <li><a href="mainclientes.php">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            <li><a href="maingeral.php">Relatório geral</a></li>
            </ul>
        </nav>
        </div>
    </div>
    </div>
    <div id="allblock">
        <div id="searchdiv">
    <input type="text" name="pesquisa"/>
    <button style="position:absolute; margin: 2px 5px ">Procurar</button>
        </div>
    <table>
            <caption>Relatório Clientes</caption>
    <tr>
        <td>Nome do cliente</td>
        <td>Avaliação média</td>
        <td>Funcionário solicitado</td>
        <td>Proporção resolução do problema(%)</td>
    </tr>
    </table>
    </div>
</body>
</head>
</html>