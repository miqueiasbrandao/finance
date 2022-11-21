<?php
include 'controler/validaSession.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'inc/head.php'; ?>
    <title>Dashboard</title>
  </head>
  <body style="background-color: #3A546E;">
  <?php include 'inc/nav.php'; ?>
  <?php include 'inc/modal.php'; ?>

  <div id="page">

    <div class="container my-3 fade-in">

      <div class="row">

        <div class="col-md">

          <h3 style="color: white;">

            Dashboard / 

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('dashboard.php?<?php echo 'redirecion='.$_GET['redirecion']; ?>')" class="btn btn-primary btn-sm">

              <i class="fa-solid fa-retweet"></i>
              
              Atualizar

            </a>

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('home.php')" class="btn btn-primary btn-sm">

              <i id="return" class="fa-solid fa-right-from-bracket"></i>
              
              Voltar

            </a>

          </h3>

        </div>

      </div>

    </div>



    




  </div>

  </body>
</html>