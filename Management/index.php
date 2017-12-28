<?php
include('php/login.php');
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
  <style>
  #btn{
    cursor: pointer;
  }
  </style>
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Usuário</label>
            <input class="form-control" name="login" id="exampleInputEmail1" type="text" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input class="form-control" name="passw" id="exampleInputPassword1" type="password">
            <span><?php echo $error; ?></span>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <!--<input class="form-check-input" type="checkbox"> Remember Password</label>-->
            </div>
          </div>
          <input class="btn btn-primary btn-block" id="btn" name="btnlogin" type="submit" value="Entrar" />
        </form>
        <div class="text-center">
          <!--<a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
        </div>
      </div>
    </div>
  </div>
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
</body>
</html>
