<?php
//include('PHP/login.php');
include('/PHP/User.php');
$userif = new User();

if(isset($_POST['btnlogin'])){
$userif->Login();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"; />
        <link href="CSS/indexstyle.css" rel="stylesheet" type="text/css"/>
            <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
        <title>Login</title>
    </head>
    <body>
        <div id="top">
            </div>
        <form action="" method="POST">
            <div id="topform"></div>
            <div id="formcontents">
            <label>Usuário</label>
            <input type="text" name="login" required/>
            <label>Senha</label>
            <input style="margin-left: 10px;" type="password" name="senha" required/>
            <div id="subdiv">
        <input style="font-weight: bold;" name="btnlogin" type="submit" value="Entrar"/>
                  <span><?php echo $userif->error; ?></span>
                </div>
            </div>    
    </form>
    </body>
</html>