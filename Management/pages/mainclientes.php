<?php
include('../php/DataBaseQuerys.php');
include('../php/PageMainValidation.php');
LoginValidation();
error_reporting(0);
?>
    <!DOCTYPE HTML>
    <HTML>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.ico" rel="icon" type "image/x-icon" />
    <link href="../css/table.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
    <title>Gerenciamento</title>
    </head>
    <body ng-app="">
    <div ng-include="'header.php'"></div>
        <div class="allblock">
            <table id="maintable" class="table-fill">
                <thead class="text-left">
                    <th id="tdname">Nome do cliente</th>
                    <th>Visitas técnicas</th>
                    <th>Formulários respondidos</th>
                    <th>Avaliação média</th>
                    <th>Efetividade(%)</th>
                </thead>
                <tbody class="table-hover">        
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
            <?php loadLink("SELECT * from customer", "mainclientes"); ?>
        </div>
    </body>
    </html>