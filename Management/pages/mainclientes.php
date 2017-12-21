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
            <?php loadLink("SELECT * from customer"); ?>
        </div>
    </body>
    </html>