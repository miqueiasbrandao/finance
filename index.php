<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="login/css/owl.carousel.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <?php include 'inc/head.php'; ?>
    <title>Login</title>
  </head>
  <body style="background-color: #3A546E;">
  

  
  <div class="content scale-in-center">
    <div class="container">
      <div class="row ">
        <div class="col-md-6">
          <img src="login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 style="color: #fff;">Seja bem vindo</h3>
              <p class="mb-4">Tenha o controle das sua finanças agora. Para acessar esta ferramenta faça o login.</p>
            </div>
            <form action="controler/validaLogin.php" method="post">
              <div class="form-group">
                <label for="username">Nome de usuário</label>
                <input name="login" type="text" class="form-control" id="username">

              </div>
              <div class="form-group last mb-4 my-2">
                <label for="senha">Informe a senha</label>
                <input type="password" name="senha" class="form-control" id="password">
                
              </div>

              <?php
              if(isset($_GET['autenticado']) && $_GET['autenticado'] == "false"){ ?>
                <p style="font-size: 15px;" class="text-danger text-center alert alert-danger" role="alert">Usuario ou senha incorretos. Tente novamente!</p>
              <?php } ?>

              <?php
              if(isset($_GET['session']) && $_GET['session'] == "false"){ ?>
                <p style="font-size: 15px;" class="text-danger text-center alert alert-danger" role="alert">Sessão encerrada. Faça o login novamente!</p>
              <?php } ?>

              <?php
              if(isset($_GET['user']) && $_GET['user'] == "add"){ ?>
                <p style="font-size: 15px;" class="text-center alert alert-success" role="alert">Usuario inserido com sucesso! Faça o login!</p>
              <?php } ?>

              <div class="d-flex mb-5 my-3 align-items-center">
                <span style="color: #fff;" class="ml-auto"><a href="createUser.php" class="">Não tem um registro? Clique aqui!</a></span> 
              </div>

              <input type="submit" value="Login" class="btn btn-primary scale-in-center">
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="login/js/jquery-3.3.1.min.js"></script>
    <script src="login/js/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
  </body>
</html>