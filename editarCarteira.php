<?php
include 'controler/validaSession.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'inc/head.php'; ?>
    <title>Editar Registro</title>
  </head>
  <body style="background-color: #3A546E;">
  <?php include 'inc/nav.php'; ?>
  <?php include 'inc/modal.php'; ?>

    <?php

      $id_guardar = $_GET['id'];
      include 'controler/conexaoSql.php';
      $consulta = $pdo->query("SELECT * FROM `f_guardar_dinheiro` WHERE id_guardar = $id_guardar;");
      $linha = $consulta->fetch(PDO::FETCH_ASSOC);

      // echo '<pre style="color: #fff;">';
      // print_r($linha);
      // echo '</pre>';

      $id = $_GET['id'];

    ?>

  <div id="page">

    <div class="container my-3 fade-in">

      <div class="row">

        <div class="col-md">

          <h4 style="color: white;">

            Editar Carteira / Formulario /

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('editarCarteira.php?id=<?php echo $_GET['id'] ?>')" class="btn btn-primary btn-sm">

              <i class="fa-solid fa-retweet"></i>
              
              Atualizar

            </a>

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('guardarDinheiro.php')" class="btn btn-primary btn-sm">

              <i id="return" class="fa-solid fa-right-from-bracket"></i>
              
              Voltar

            </a>

          </h4>

        </div>

      </div>

    </div>


    <!-- começando o card -------------------- -->

    <div class="row mx-auto slide-in-blurred-top">
      <div class="col-md-6 mx-auto">
        <div class="card p-3" >
          <form action="controler/editarSalvar_carteira.php" method="post">

            <input value="<?php echo $id ?>" name="id" type="hidden">

            <div class="row">

              <div class="col-md-6 mt-2">

                <div class="form-group">

                <label for="descricao">

                Data

                </label>

                <input value="<?php echo $linha['data'] ?>" name="date" type="date" class="form-control">
                
                </div>

              </div>

              <div class="col-md-6 mt-2">

                <div class="form-group">

                <label for="valor">

                Valor R$

                </label>

                <input value="<?php echo $linha['valor'] ?>" name="valor" type="text" class="form-control">
                
                </div>

              </div>

            
            </div>

              <div class="col-md-12 mt-2">
                  
                <div class="form-group">

                <label for="descricao">

                Descrição

                </label>

                <input value="<?php echo $linha['descricao'] ?>" type="text" class="form-control" id="descricao" name="descricao">

                </div>

              </div>

            <div class="row">

              </div>

              <div class="col-md-12 mt-2">
                  
                <div class="form-group">

                  <label for="objetivo">
                      
                    Objetivo
                      
                  </label>
                  
                  <input value="<?php echo $linha['objetivo'] ?>" type="text" class="form-control" id="descricao" name="objetivo">

                </div>

              </div>

              <div class="text-end my-4">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-share-from-square"></i> Salvar</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- -------------------- -->

    

  </div>

  </body>
</html>