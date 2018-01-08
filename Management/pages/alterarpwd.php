<?php
include '../php/DataBaseQuerys.php';
include_once '../php/PageMainValidation.php';
include_once '../php/validacaoPaginaELimite.php';
include "../php/changepwd.php";
?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login | Gerenciamento</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato: 100,300,400,700|Luckiest+Guy|Oxygen:300,400" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  </head>
  <body ng-app="">
    <div ng-include="'header.php'"></div>
    <div class="container">
      <div class="card card-login mx-auto mt-5 body-container" style="width: 600px;">
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="exampleFormControlInput1">Nova senha</label>
              <input class="form-control" name="passnew" id="exampleInputPassword1" type="password">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Confirmar senha</label>
              <input class="form-control" name="passnewconfirm" id="exampleInputPassword1" type="password">
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
              </div>
            </div>
            <input class="btn btn-primary btn-block" id="btn" style="cursor: pointer;" name="btnchangepwd" type="submit" value="Salvar" />
            <br>
            <span><?php echo $result ?></span>
          </form>
          <div class="text-center">
          </div>
        </div>
      </div>
    </div>
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
  </body>
  </html>