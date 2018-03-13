<?php
include '../php/DataBaseQuerys.php';
include_once '../php/PageMainValidation.php';
include_once '../php/validacaoPaginaELimite.php';

LoginValidation();

?>
    <!DOCTYPE HTML>
    <HTML>
    <head>
        <meta charset="UTF-8">
        <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
        <link href="../Img/logo.ico" rel="icon" type "image/x-icon" />
        <link href="../css/table.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
        <script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
        <script src="../js/tablejs.js"></script>
        <script src="../js/sorttable.js"></script>
        <title>Gerenciamento</title>
        </head>
        <body ng-app="">
        <div ng-include="'header.php'"></div>''
        <div ng-include="'filter.html'"></div>
        <div class="allblock" id="formtable">
        <table id="maintable" class="table-fill tablesorter">
        <thead class="text-left">
                    <th class="not-background tdinfos">Info</th>
                    <th id="tdname">Nome do cliente</th>
                    <th class="td-tecnico">Técnico solicitado</th>
                    <th id="tdnota">Nota</th>
                    <th class="td-problema">Problema resolvido ?</th>
                    <th class="td-comentario">Comentário</th>
                    <th class="tddata">Data de envio</th>
                    <th class="tddata">Data de resposta</th>
                </thead>
                <tbody  class="table-hover">
                    <?php 
                        tratarPaginaELimiteDeEmForms();           
                    ?>
                </tbody>
            </table>
            <?php 
                loadLink("SELECT * from form", "mainfomsanswereds", $_GET["lmt"]);
            ?>
        </div>
</div>
</body>
</html>