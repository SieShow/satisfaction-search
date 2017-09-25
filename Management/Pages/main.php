<?php
include('../PHP/updateprofile.php');
include('../PHP/Counter.php');
include('../PHP/PageMainValidation.php');
LoginValidation();
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../CSS/MainPageBonito.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/main-blocks.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
                    <label id="username"><?php echo $user ?></label>
                </div>     
        <a id="prof" onclick="document.getElementById('profileinfo').style.display='block'">Editar perfil</a>
        <a href="../PHP/Logout.php">Sair</a>
        </div>
        </div>
    <div id="menu">
        <div id="menuhorizontal">
        <ul>
            <li><a href="">Inicial</a></li>
            <li><a href="mainclientes.php">Clientes</a></li>
            <li><a href="mainfunc.php">Funcionários</a></li>
            <li><a href="mainfomsanswereds.php">Formulários</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div class="container">
        <div id="container-textdescrit">
            <div id="subcontainer">
                <h1>Registros</h1>
            </div>
        </div>
        <div id="block1" class="block">
          <div class="align-content">
            <div class="sub-cont">
                <img src="../Img/customer.png" />
            </div>
            <div class="textright">
                <div class="textright huge"><?php Customers();?></div>
                <div>Clientes</div>
            </div>
        </div>
         <a class="footerlink" id="footerlink1" href="mainclientes.php">
            <div id="blockfooter1" class="blockfooter">
              <span>Ir para página</span>
               <img src="../Img/follow-button-green.png" />         
            </div>
         </a>
        </div>
        <div id="block2" class="block">
            <div class="align-content">
            <div class="sub-cont">
                <img src="../Img/employee.png" />
            </div>
            <div class="textright">
                <div class="textright huge"><?php Employee(); ?></div>
                <div>Funcionários</div>
            </div>
         </div>
         <a class="footerlink" id="footerlink2" href="mainfunc.php">
            <div id="blockfooter2" class="blockfooter">
              <span>Ir para página</span>
               <img src="../Img/follow-button-blue.png" />         
            </div>
         </a>
         </div>
          <div id="block3" class="block">
            <div class="align-content">
            <div class="sub-cont">
                <img src="../Img/check-form.png" />
            </div>
            <div class="textright">
                <div class="textright huge"><?php Forms(); ?></div>
                <div>Formulários respondidos</div>
            </div>
         </div>
         <a class="footerlink" id="footerlink3" href="#">
            <div id="blockfooter3" class="blockfooter">
              <span>Ir para página</span>
               <img src="../Img/follow-button-red.png" />         
            </div>
         </a>
         </div>
        </div>
    </div>
    <div id="conf">
    <form method="POST" action="" id="profileinfo">
        <img id="profileimg" src="../Img/User-unknown.png">
        <input id="imageinput" type="file" accept="image/*" title="" onchange="loadimg(this);" />
        <label>Usuário</label>
        <input class="otinput" id="txtuser" name="newname" type="text" value="<?php echo $user ?>" />
        <label>Nova senha</label>
        <input class="otinput" id="txtpassword" name="newpass"type="password" value="" />
        <label>Confirma senha</label>
        <input class="otinput" id="txtpassconfirm" name="newpassconfirm" type="password" value="" />
        <span id="fail"><?php echo $msg; ?></span>
        <div>
        <button type="button" id="cancel">Cancelar</button>
        <button name="btnupdate" id="save">Salvar</button>
        </div>
</form>
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
    document.getElementById('profileinfo').style.display='block';
}

document.getElementById("cancel").onclick = function(){
    document.getElementById('profileinfo').style.display='none';
    document.getElementById("profileimg").value = "";
}

function loadimg(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var file = document.getElementById("imageinput").value;
        reader.onload = function (e) {
            $('#profileimg').attr('src', e.target.result).width(120).height(120);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>