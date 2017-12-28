<?php
include('../php/DataBaseQuerys.php');
include('../php/PageMainValidation.php');
LoginValidation();
error_reporting(0);
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
        <button id="openfilters">Mais filtros</button>
        <ul id="filtro-avancado">
          <form action="">
          <span>Por data de inicio</span>
          <li class="filtro-content">
            <span>De</span>
            <input name="de-inicio" type="date">
            <br>
            <span>Até</span>
            <input type="date" name="ate-inicio" id="datepicker">
            <br>      
          </li>
          <span>Por data de Resposta</span>
          <li class="filtro-content">
            <span>De</span>
            <input type="date" name="de-resposta">
            <br>
            <span>Até</span>
            <input type="date" name="ate-resposta">
            <br>      
          </li>
          <button>Procurar</button>
          </form>
        </ul>
        </div>
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
                    loadForms(validatePage($_GET["pg"]), validateLimit($_GET["lmt"]));
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
</body>
</html>