<?php
include 'controler/validaSession.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body style="background-color: #3A546E;">
  <?php include 'inc/modal.php'; ?>
  <?php include 'inc/nav.php'; ?>

  <div class="container mt-5 slide-in-blurred-top" style="background-color: #3A546E;">
    <div id="page" class="card" style="z-index: 99;">
      <div class="card-body mx-auto">

        <div class="row mx-auto">

          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('despesas.php')" class="card text-center mx-1 border-light" style="width: 16rem; text-decoration: none; color: black;">
            <div id="c1" class="card-body" style="color: #8E0000;">
              <i  style="font-size: 120px;" class="fa-solid fa-file-invoice-dollar"></i>
              <p class="my-2"><b> Despesa</b></p>
            </div>
          </a>

          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('receita.php')" class="card text-center mx-1 border-light" style="width: 16rem; text-decoration: none; color: black;">
            <div id="c1" style="color: #006405" class="card-body">
              <i  style="font-size: 120px;" class="fa-solid fa-sack-dollar"></i>
              <p class="my-2"><b> Receita</b></p>
            </div>
          </a>

          
          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('guardarDinheiro.php')" class="card text-center mx-1 border-light" style="width: 16rem; text-decoration: none; color: #75B100;">
            <div id="c1" class="card-body">
              <i  style="font-size: 120px;" class="fa-solid fa-circle-dollar-to-slot"></i>
              <p  class="my-2"><b>Dinheiro Guardado</b></p>
            </div>
          </a>

          <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('dashboard.php?redirecion=painelgeral')" class="card text-center mx-1 border-light" style="width: 16rem; text-decoration: none; color: #A25400;">
            <div id="c1" class="card-body">
              <i  style="font-size: 120px;" class="fa-solid fa-chart-column"></i>
              <p  class="my-2"><b>DashBoard</b></p>
            </div>
          </a>

      </div>
    </div>
  </div>

      <div class="text-center my-1">
        <div id="spinner" style="width: 9rem; height: 9rem;" class="invisible text-center spinner-border text-light my-auto" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

  </body>
</html>