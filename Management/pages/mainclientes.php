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
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type "image/x-icon" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <link href="../css/table.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
    <title>Gerenciamento</title>
    </head>
    <body ng-app="">
    <div ng-include="'header.html'"></div>
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
                    <?php
                    if($_GET["pg"] == null || !is_numeric($_GET["pg"])){
                        loadClient(1); 
                    }   
                    else{
                        loadClient($_GET["pg"]);
                    }
                    ?>
                </tbody>
            </table>
            <?php loadLink("SELECT * from customer"); ?>
        </div>
    </body>
    </html>