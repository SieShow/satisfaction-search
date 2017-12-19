<?php
include('../php/DataBaseQuerys.php');
include('../php/updateprofile.php');
include('../php/PageMainValidation.php');
LoginValidation();
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <link href="../CSS/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../Img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <title>Gerenciamento</title>
</head>
<body ng-app="">
    <div ng-include="'header.html'"></div>
    <div class="allblock">
        <div id="searchdiv">
    <input type="text" placeholder="Ache os funcionários !" name="pesquisa"/>
        </div>
    <table>
        <thead id="thead">
        <td id="nametd">Nome</td>
        <td>Nota média</td>
        <td>Média de efetividade do atendimento</td>
        </thead>
   <tbody id="tbody">
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
      <?php loadLink("SELECT * from employee"); ?>
    </div>
</body>
</html>