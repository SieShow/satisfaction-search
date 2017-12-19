<?php
include('../PHP/DataBaseQuerys.php');
include('../PHP/updateprofile.php');
include('../PHP/PageMainValidation.php');
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
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <title>Gerenciamento</title>
        </head>
        <body ng-app="">
        <div ng-include="'header.html'"></div>
        <div class="allblock" id="formtable">
            <div id="searchdiv">
                <input type="text" placeholder="Ache os clientes e funcionários !" name="pesquisa" />
            </div>
            <table id="maintable">
                <thead id="thead">
                    <td id="tdname">Nome do cliente</td>
                    <td>Técnico solicitado</td>
                    <td id="tdnota">Nota</td>
                    <td>Problema resolvido ?</td>
                    <td>Comentário</td>
                    <td class="tddata">Data de envio</td>
                    <td class="tddata">Data de resposta</td>
                </thead>
                <tbody id="tbody">
                    <?php 
                    if($_GET["pg"] == null || !is_numeric($_GET["pg"])){
                    loadForms(1);
                    }
                    else{
                        loadForms($_GET["pg"]);
                    }
                    ?>
                </tbody>
            </table>
            <?php loadLink("SELECT * from forms"); ?>$_ENV
        </div>
    </body>
    </html>