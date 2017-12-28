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
        <title>Gerenciamento</title>
        </head>
        <body ng-app="">
        <div ng-include="'header.php'"></div>
        <div class="allblock" id="formtable">
        <div class="filter">
        <label>Exibir          
        <select onchange="window.location.href=this.value;">
         <option value="mainfomsanswereds.php?lmt=5">5</option>
         <option value="mainfomsanswereds.php?lmt=10">10</option>
         <option value="mainfomsanswereds.php?lmt=15">15</option>
         <option value="mainfomsanswereds.php?lmt=20">20</option>
         <option value="mainfomsanswereds.php?lmt=25">25</option>
         <option value="mainfomsanswereds.php?lmt=50">50</option>
         <option value="mainfomsanswereds.php?lmt=100">100</option>
         <option value="mainfomsanswereds.php?lmt=150">150</option>
         <option value="mainfomsanswereds.php?lmt=200">200</option> 
        </select>
        Resultados
        </label>
        <button id="openfilters" onclick="displayFilter()">Mais filtros</button>
        <ul id="filtro-avancado">
          <div id="pointer-filtro"></div>
          <form action="" method="POST">
          <span>Por data de Envio:</span>
          <li class="filtro-content" id="primeiro-filtro">
            <span>De</span>
            <input name="send-start" id="send-start" type="date">
            <br>
            <span>Até</span>
            <input type="date" name="send-end" id="send-end">
            <br>      
          </li>
          <span>Por data de Resposta:</span>
          <li class="filtro-content">
            <span>De</span>
            <input type="date" name="ans-start" id="ans-start">
            <br>
            <span>Até</span>
            <input type="date" name="ans-end">
            <br>      
          </li>
          <button type="submit" onclick="search()" name="btnsearch">Procurar</button>
          </form>
        </ul>
        </div>
        <table id="maintable" class="table-fill">
        <thead class="text-left">
                    <th id="tdname" onclick="sortTable(0)">Nome do cliente</th>
                    <th onclick="sortTable(1)">Técnico solicitado</th>
                    <th onclick="sortTable(2)" id="tdnota">Nota</th>
                    <th onclick="sortTable(3)">Problema resolvido ?</th>
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
        <script src="../js/tablejs.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
</body>
</html>