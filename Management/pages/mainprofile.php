<?php
include '../php/DataBaseQuerys.php';
include '../php/PageMainValidation.php';
LoginValidation();
ProfileValidation();

if(!isset($_GET["pg"])){
    $_GET["pg"] = 1;
  }
  if(!isset($_GET["lmt"])){
    $_GET["lmt"] = 25;
  }

$prof;
if($_GET["type"] == "c"){
    include '../php/class/Customer.php';
    $prof = new Customer($_GET["profile"]);
}
else {
    include '../php/class/Employee.php';
    $prof = new Employee($_GET["profile"]);
}
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link href="../css/profileInfos.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="../css/table.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <title>Gerenciamento</title>
</head>
<body ng-app="">
    <div ng-include="'header.php'"></div>
    <div id="profilebody">
        <div id="content">
        <div id="sub-cont2">
        <?php
        echo "<h2>".$prof->GetName()."</h2>";
        echo "<label>Visitas Técnicas:  ".$prof->GetTotalOfVisits()."</label>";
        if($_GET["type"] == "c"){
            echo "<label>Formulários respondidos:  ".$prof->GetForms_Answereds()." </label>";
        }
        echo "<label>Código no VIP:  ".$prof->GetV11_Code()."</label>";

        if($_GET["type"] == "c")echo "<label>Email:  ".$prof->GetEmails()."</label>";
        else if($_GET["type"] == "e"){
            echo "<label>Nota média:  ".$prof->GetNote_avarage(). "</label>";
            echo "<label>Média de solução de problemas:  ".$prof->GetIssue_avarage(). "</label>";          
        }
        ?>
        </div>
        </div>
        <div class="content-sub">
        <h3>Histórico</h3>
        <table id="maintable" class="table-fill">
            <thead class="text-left">
                <?php  LoadTableColuns($_GET["type"]);?>
            </thead>
            <tbody class="table-hover">
                <?php $prof->LoadHistoric();?>
            </tbody>
        </table>
        </div>
    </div>
        <script src="../js/tablejs.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
</body>
</html>