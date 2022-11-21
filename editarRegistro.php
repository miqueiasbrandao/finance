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

      $id_registro = $_GET['id'];
      include 'controler/conexaoSql.php';
      $consulta = $pdo->query("SELECT * FROM `f_registros` WHERE id_registro = $id_registro;");
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

            Editar Registro / Formulario / 

            <?php
            if($linha['natureza'] == 'receita'){
              echo 'Editar Receita';
            }
            if($linha['natureza'] == 'despesa'){
              echo 'Editar Despesa';
            }
            ?>

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('editarRegistro.php?id=<?php echo $_GET['id'] ?>')" class="btn btn-primary btn-sm">

              <i class="fa-solid fa-retweet"></i>
              
              Atualizar

            </a>


            <?php if($linha['natureza'] == 'despesa'){ ?>
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('despesas.php')" class="btn btn-primary btn-sm">

              <i id="return" class="fa-solid fa-right-from-bracket"></i>
              
              Voltar

            </a>
            <?php } ?>

            <?php if($linha['natureza'] == 'receita'){ ?>
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('receita.php')" class="btn btn-primary btn-sm">

              <i id="return" class="fa-solid fa-right-from-bracket"></i>
              
              Voltar

            </a>
            <?php } ?>

          </h4>

        </div>

      </div>

    </div>


    <!-- começando o card -------------------- -->

    <div class="row mx-auto slide-in-blurred-top">
      <div class="col-md-6 mx-auto">
        <div class="card p-3" >
          <form action="controler/editarSalvar_registros.php" method="post">

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

                  <label for="categoria">

                  Categoria

                  </label>


                  <input disabled placeholder="<?php echo $linha['categoria'] ?>" type="text" class="form-control">

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

              <?php if($linha['natureza'] == 'despesa'){ ?>
                <div class="col-md-4 mt-2">
              <?php } ?>

              <?php if($linha['natureza'] == 'receita'){ ?>
                <div class="col-md-12 mt-2">
              <?php } ?>
                  
                <div class="form-group">

                  <label for="valor">
                      
                      Valor R$
                      
                  </label>
                  
                  <input value="<?php echo $linha['valor'] ?>" type="number" class="form-control" id="valor" name="valor">

                </div>

              </div>

              <?php
              if($linha['natureza'] == 'despesa'){
              ?>
              <div class="col-md-8 mt-2">
                  
                <div class="form-group">

                  <label for="descricao">
                      
                      Se parcelado, em quantas veses?
                      
                  </label>
                  
                  <input disabled placeholder="<?php echo $linha['parcelamento'] ?>" type="number" class="form-control" id="descricao" name="descricao">

                </div>

              </div>

            </div>

            <div class="col-md-12 mt-2">
                
              <div class="form-group">

                <label>

                Tipo da despesa

                </label>

                <input placeholder="<?php echo $linha['tipo'] ?>" disabled name="tipo" type="number" class="form-control" id="descricao" name="descricao">


              </div>

            </div>

            <?php } ?>

            <p class="text-danger my-1" style="font-size: 13px;">*Algumas informações não podem ser alteradas</p>


            <?php
              if($linha['natureza'] == 'despesa'){
            ?>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-paper-plane"></i> Salvar Despesa</button>
            </div>
            <?php } ?>      

            <?php
              if($linha['natureza'] == 'receita'){
            ?>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Salvar Receita</button>
            </div>
            <?php } ?> 

          </form>
        </div>
      </div>
    </div>
    
    <!-- -------------------- -->

    

  </div>

  </body>
</html>