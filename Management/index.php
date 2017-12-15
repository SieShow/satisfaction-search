<?php
include('PHP/login.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"; />
        <link href="css/indexstyle.css" rel="stylesheet" type="text/css"/>
            <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
        <title>Login</title>
    </head>
    <body>
        <form action="" method="POST">
            <div id="formcontents">
            <label>Usuário</label>
            <input type="text" name="login" required/>
            <label>Senha</label>
        <input style="margin-left: 10px;" type="password" name="passw" onkeypress="capLock(event)" required/>
            <div id="subdiv">
        <input style="font-weight: bold;" name="btnlogin" type="submit" value="Entrar"/>
                  <span><?php echo $error; ?></span>
                </div>    
            </div>    
<!--            <div id="divMayus" style="visibility:hidden; Z-index:10;">Caps Lock is on.</div>  -->  
    </form>
    <script>
    function capLock(e){
        var kc = e.keyCode ? e.keyCode : e.which;
        var sk = e.shiftKey ? e.shiftKey : kc === 16;
        var visibility = ((kc >= 65 && kc <= 90) && !sk) || 
        ((kc >= 97 && kc <= 122) && sk) ? 'visible' : 'hidden';
        document.getElementById('divMayus').style.visibility = visibility
}
    </script>
    </body>
</html>