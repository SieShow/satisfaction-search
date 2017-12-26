<?php
include('../PHP/DataBaseQuerys.php');
include('../PHP/updateprofile.php');
include('../PHP/PageMainValidation.php');
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
        <title>Gerenciamento</title>
        </head>
        <body ng-app="">
        <div ng-include="'header.html'"></div>
        <div class="allblock" id="formtable">
        <table id="maintable" class="table-fill">
        <thead class="text-left">
                    <th id="tdname">Nome do cliente</th>
                    <th>Técnico solicitado</th>
                    <th id="tdnota">Nota</th>
                    <th>Problema resolvido ?</th>
                    <th>Comentário</th>
                    <th class="tddata">Data de envio</th>
                    <th class="tddata">Data de resposta</th>
                </thead>
                <tbody  class="table-hover">
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
            <?php loadLink("SELECT * from form", "mainfomsanswereds"); ?>
        </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>