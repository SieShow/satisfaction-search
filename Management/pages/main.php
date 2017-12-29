<?php
include('../php/Counter.php');
include('../php/PageMainValidation.php');
LoginValidation();
?>
<!DOCTYPE HTML>
<HTML>
<head>
    <meta charset = "utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/mainPagesStyle.css" rel="stylesheet" type="text/css" />
    <link href="../img/logo.ico" rel="icon" type"image/x-icon" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/full-width-pics.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/bootstrap.min2.css" rel="stylesheeet">
    <link href="../css/main-blocks.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet">
    <title>Gerenciamento</title>
</head>
<body ng-app="">
<div ng-include="'header.php'"></div>
            <div class="row conteudo">
                <div class="col-lg-3 col-md-6 subcontainer">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php Customers(); ?></div>
                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="mainclientes.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ir para página</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php Employee()?></div>
                                    <div>Funcionários</div>
                                </div>
                            </div>
                        </div>
                        <a href="mainfunc.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ir para página</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php Forms(); ?></div>
                                    <div>Formulários</div>
                                </div>
                            </div>
                        </div>
                        <a href="mainfomsanswereds.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ir para página</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</body>
</html>