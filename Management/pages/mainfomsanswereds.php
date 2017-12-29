<?php
include('../php/DataBaseQuerys.php');
include('../php/PageMainValidation.php');
LoginValidation();

if(!isset($_GET["pg"])){
  $_GET["pg"] = 1;
}
if(!isset($_GET["lmt"])){
  $_GET["lmt"] = 25;
}

?>
    <!DOCTYPE HTML>
    <HTML>
    <head>
        <meta charset="UTF-8">
        <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
        <link href="../Img/logo.ico" rel="icon" type "image/x-icon" />
        <link href="../css/table.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
        <script src="../js/tablejs.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
        <title>Gerenciamento</title>
        </head>
        <body ng-app="">
        <div ng-include="'header.php'"></div>
        <div ng-include="'filter.html'"></div>
        <div class="allblock" id="formtable">
        <table id="maintable" class="table-fill">
        <thead class="text-left">
                    <th id="tdname" onclick="sortTable(0)">Nome do cliente</th>
                    <th onclick="sortTable(1)" class="td-tecnico">Técnico solicitado</th>
                    <th onclick="sortTable(2)" id="tdnota">Nota</th>
                    <th onclick="sortTable(3)" class="td-problema">Problema resolvido ?</th>
                    <th onclick="sortTable(4)">Comentário</th>
                    <th onclick="sortTable(5)" class="tddata">Data de envio</th>
                    <th onclick="sortTable(6)" class="tddata">Data de resposta</th>
                </thead>
                <tbody  class="table-hover">
                    <?php 
                    if(isset($_POST["btnsearch"]))
                    {
                     if((isset($_POST["ans-start"]) && isset($_POST["ans-end"])) &&
                      ($_POST["ans-start"] != "" && $_POST["ans-end"] != "") && 
                      ((isset($_POST["send-start"]) && isset($_POST["send-end"])) &&
                       ($_POST["send-start"] != "" && $_POST["send-end"] != "")))
                       {
                        loadFormByAnswerAndSendAsFilter($_GET["pg"], $_GET["lmt"], $_POST["send-start"], $_POST["send-end"],
                         $_POST["ans-start"], $_POST["send-end"]);
                      }

                      else if((isset($_POST["send-start"]) && isset($_POST["send-end"])) &&
                       ($_POST["send-start"] != "" && $_POST["send-end"] != ""))
                      {
                        loadFormsBySendDateAsFilter($_GET["pg"], $_GET["lmt"],
                         $_POST["send-start"], $_POST["send-end"]);
                      }

                      else if((isset($_POST["ans-start"]) && isset($_POST["ans-end"])) &&
                      $_POST["ans-start"] != "" && $_POST["ans-end"] != "")
                      {
                          loadFormsByAnswerDateAsFilter($_GET["pg"], $_GET["lmt"],
                         $_POST["ans-start"], $_POST["ans-end"]);
                      }
                      else{
                           loadForms($_GET["pg"], $_GET["lmt"]);
                      }
                    }
                    else{
                      loadForms($_GET["pg"], $_GET["lmt"]);
                    }              
                    ?>
                </tbody>
            </table>
            <?php 
                loadLink("SELECT * from form", "mainfomsanswereds", validateLimit($_GET["lmt"]));
            ?>
        </div>
</div>
</body>
</html>