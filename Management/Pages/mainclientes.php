<?php
include('../php/DataBaseQuerys.php');
include('../php/updateprofile.php');
include('../php/PageMainValidation.php');
LoginValidation();
?>
    <!DOCTYPE HTML>
    <HTML>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type "image/x-icon" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <link href="../css/table.css" rel="stylesheet" type="text/css"/>
    <title>Gerenciamento</title>
    </head>
    <body>
        <div id="headpage">
            <div id="usernameoption">
                <img src="../Img/User-unknown.png" id="imgclick">
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
                        <li><a href="main.php">Inicial</a></li>
                        <li><a href="">Clientes</a></li>
                        <li><a href="mainfunc.php">Funcionários</a></li>
                        <li><a href="mainfomsanswereds.php">Formulários</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="allblock">
            <div id="searchdiv">
                <input type="text" placeholder="Ache os clientes e funcionários !" name="pesquisa" />
            </div>
            <table id="maintable">
                <thead id="thead">
                    <td id="tdname">Nome do cliente</td>
                    <td>Formulários respondidos</td>
                    <td>Visitas técnicas</td>
                    <td>Avaliação média</td>
                    <td>Efetividade(%)</td>
                </thead>
                <tbody id="tbody">          
                    <?php loadC(2); ?>
                </tbody>
            </table>
            <?php loadClientLink(); ?>
        </div>
        <div id="conf">
            <form method="POST" action="" id="profileinfo">
                <img id="profileimg" src="../Img/User-unknown.png">
                <input id="imageinput" type="file" accept="image/*" title="" onchange="loadimg(this);" />
                <label>Usuário</label>
                <input class="otinput" id="txtuser" name="newname" type="text" value="<?php echo $user ?>" />
                <label>Nova senha</label>
                <input class="otinput" id="txtpassword" name="newpass" type="password" value="" />
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

            document.onclick = function(e) {
                if (e.target == img) {
                    if (modal.style.display == 'block') {
                        modal.style.display = 'none';
                    } else {
                        modal.style.display = 'block';
                    }
                } else {
                    modal.style.display = 'none';
                }
            }

            document.getElementById("prof").onclick = function() {
                document.getElementById('profileinfo').style.display = 'block';
            }

            document.getElementById("cancel").onclick = function() {
                document.getElementById('profileinfo').style.display = 'none';
                document.getElementById("profileimg").value = "";
            }

            function loadimg(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var file = document.getElementById("imageinput").value;
                    reader.onload = function(e) {
                        $('#profileimg').attr('src', e.target.result).width(120).height(120);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
    </html>