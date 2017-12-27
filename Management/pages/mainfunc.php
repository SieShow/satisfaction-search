<?php
include('../php/DataBaseQuerys.php');
include('../php/PageMainValidation.php');
LoginValidation();
error_reporting(0);
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="../css/table.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <title>Gerenciamento</title>
</head>
<body ng-app="">
    <div ng-include="'header.php'"></div>
    <div class="allblock">
    <table id="maintable" class="table-fill">
                <thead class="text-left">
                <th id="tdname">Nome</th>
                <th>Nota média</th>
                <th>Visitas Técnicas</th>
                </thead>
   <tbody class="table-hover">
    <?php  
        if($_GET["pg"] == null || !is_numeric($_GET["pg"]))
        {
            loadEmployers(1); 
        }   
        else
        {
        loadEmployers($_GET["pg"]);
        }
    ?>
    </tbody>
    </table>
      <?php loadLink("SELECT * from employee", "mainfunc"); ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</body>
</html>