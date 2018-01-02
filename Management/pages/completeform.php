<?php
include '../php/DataBaseQuerys.php';
include_once '../php/PageMainValidation.php';
include_once '../php/validacaoPaginaELimite.php';
include_once '../php/class/Formulario.php';

LoginValidation();
$instance = new Formulario($_GET["id"]);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.ico" rel="icon" type "image/x-icon" />
    <link href="../css/table.css" rel="stylesheet" type="text/css"/>
    <link href="../css/formulario-completo.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
</head>
<body ng-app="">
    <div ng-include="'header.php'"></div>
    <div class="full-form">
        <h1><?php echo $instance->getCustomer()->GetName();?></h1>
        <p>Técnico: <?php echo $instance->getEmployee()->getName(); ?> </p>
        <p>Nota: <?php echo $instance->getEvaluation_solve() ?> </p>
        <p>Data de envio do formulário: <?php echo $instance->getRequest_Sent() ?></p>
        <p>Data de resposta: <?php echo $instance->getResquest_Answered() ?> </p>
        <p>Comentário:</p>
        <div class="commentary">
        <p><?php echo $instance->getCommentary() ?></p>
        </div>
        <form action="mainprofile.php?id="<?php $instance->getCustomer()->getID(); ?>>
            <button class="blue">Perfil do Cliente</button>
        </form>
        <form action="">
            <button class="green">Perfil do Funcionário</button>
        </form>
    </div>
</body>
</html>