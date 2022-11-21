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
    <?php include 'inc/head.php'; ?>
    <title>Criar Usuario</title>
  </head>
  <body style="background-color: #3A546E;">
  

  
  <div class="content scale-in-center">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 style="color: #fff;">Não tem um registro?</h3>
              <p class="mb-4">Tenha o controle das sua finanças agora. Para registrar, informe os dados abaixo.</p>
            </div>
            <form action="controler/criarUsuario.php" method="post">
              <div class="form-group">
                <label for="username">Nome de usuário</label>
                <input name="login" type="text" class="form-control" id="username">

              </div>
              <div class="form-group my-1">
                <label for="senha">Informe a senha</label>
                <input type="password" name="senha" class="form-control" id="password">
                
              </div>

              <div class="form-group my-1">
                <label for="senha">Informe a senha novamente</label>
                <input type="password" name="senha2" class="form-control" id="password">
                
              </div>

              <?php
              if(isset($_GET['create']) && $_GET['create'] == "erro001"){ ?>
                <p style="font-size: 15px;" class="text-danger text-center alert alert-danger" role="alert">Dados incompletos. Tente novamente!</p>
              <?php } ?>

              <?php
              if(isset($_GET['user']) && $_GET['user'] == "false"){ ?>
                <p style="font-size: 15px;" class="text-danger text-center alert alert-danger" role="alert">Não foi possivel vriar um usuario. Tente novamente!</p>
              <?php } ?>

              <?php
              if(isset($_GET['password']) && $_GET['password'] == "erro001"){ ?>
                <p style="font-size: 15px;" class="text-danger text-center alert alert-danger" role="alert">Senhas não conferem! Tente novamente!</p>
              <?php } ?>

              <div class="d-flex my-3 align-items-center">
                <span style="color: #fff;" class="ml-auto"><a href="index.php" class="">Já tem um registro? Clique aqui!</a></span> 
              </div>

              <input type="submit" value="Registrar" class="btn btn-primary">
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