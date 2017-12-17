<?php
include '../PHP/DataBaseQuerys.php';
include '../PHP/PageMainValidation.php';

LoginValidation();
ProfileValidation();

$prof;
if($_GET["type"] == "c"){
    include '../PHP/Class/Customer.php';
    $prof = new Customer($_GET["profile"]);
}
else {
    include '../PHP/Class/Employee.php';
    $prof = new Employee($_GET["profile"]);
}
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../CSS/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/ProfileInfos.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
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
                    <label><?php echo $prof->GetName(); ?></label>
                </div>     
        <a href="">Editar perfil</a>
        <a href="../PHP/Logout.php">Sair</a>
        </div>
        </div>
    <div id="menu">
        <div id="menuhorizontal">
        <ul>
            <li><a href="main.php">Inicial</a></li>
            <li><a href="mainclientes.php">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            <li><a href="mainfomsanswereds.php">Formulários</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div id="profilebody">
        <div id="content">
        <div id="sub-cont2">
        <?php
        echo "<h2>".$prof->GetName()."</h2>";
        echo "<label>Visitas Técnicas: ".$prof->GetTotalOfVisits()."</label>";
        echo "<label>Código no VIP: ".$prof->GetV11_Code()."</label>";

        if($_GET["type"] == "c")echo "<label>Email: ".$prof->GetEmails()."</label>";
        else if($_GET["type"] == "e"){
            echo "<label>Nota média: ".$prof->GetNote_avarage(). "</label>";
            echo "<label>Média de solução de problemas: ".$prof->GetIssue_avarage(). "</label>";          
        }
        ?>
        </div>
        </div>
        <div class="content-sub">
        <h3>Histórico</h3>
        <table bgcolor="#ECEAEA">
            <thead id="thead">
                <?php  LoadTableColuns($_GET["type"]);?>
            </thead>
            <tbody id="tbody" class="">
                <?php $prof->LoadHistoric();?>
            </tbody>
        </table>
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
</script>
</body>
</html>