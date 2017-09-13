<?php
include('../PHP/DataBaseQuerys.php');
include('../PHP/PageMainValidation.php');
include_once('../PHP/Profile.php');

LoginValidation();
ProfileValidation();
$prof = new Profile($_GET["profile"], $_GET["type"]);
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../CSS/MainPageBonito.css" rel="stylesheet" type="text/css" />
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
            <li><a href="mainclientes.php">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div id="profilebody">
        <div id="content">
        <div id="sub-cont2">
        <h2><?php  echo $prof->GetName(); ?></h2>
        <label>Visitas Técnicas: <?php echo $prof->TotalOfVisits(); ?></label>
        <label>Ultima visita técnica: <?php $prof->GetLastVisit(); ?></label>
        <?php 
        if($_GET["type"] == "c"){
            echo "<label>Email:".$prof->GetEmails(). "</label>";
        }
        ?>
        </div>
        </div>
        <div class="content-sub">
        <h3>Histórico</h3>
        <table>
            <tr>
                <?php  LoadTableColuns($_GET["type"]);               
                LoadCustomerProfile($_GET["profile"], $prof->GetKind());
                ?>
            </tr>
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