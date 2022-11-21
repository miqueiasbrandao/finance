<?php
include 'controler/validaSession.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'inc/head.php'; ?>
    <title>Dinheiro Guardado</title>
  </head>
  <body style="background-color: #3A546E;">
  <?php include 'inc/nav.php'; ?>
  <?php include 'inc/modal.php'; ?>

  <div id="page">

    <div class="container my-3 fade-in">

      <div class="row">

        <div class="col-md">

          <h3 style="color: white;">

            Dinheiro Guardado / 

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('guardarDinheiro.php')" class="btn btn-primary btn-sm">

              <i class="fa-solid fa-retweet"></i>
              
              Atualizar

            </a>

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('home.php')" class="btn btn-primary btn-sm">

              <i id="return" class="fa-solid fa-right-from-bracket"></i>
              
              Voltar

            </a>

          </h3>

        </div>
        
        <div class="col-md text-end">

          <div class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#guardar">+Dinheiro a carteira</div>

        </div>

      </div>

    </div>

    <?php
      if(isset($_GET['dinheiroguardado']) && $_GET['dinheiroguardado'] == "true"){
      ?>
        <p class="text-center alert alert-success mt-2 container fade-in" role="alert">Novo dinheiro inserido com sucesso!</p>
      <?php
      }

      if(isset($_GET['alteracao']) && $_GET['alteracao'] == "true"){
      ?>
        <p class="text-center alert alert-success mt-2 container fade-in" role="alert">Alteração feita com sucesso!</p>
      <?php
      }

      if(isset($_GET['wallet']) && $_GET['wallet'] == "delet"){
      ?>
        <p class="text-center alert alert-danger mt-2 container fade-in" role="alert">Registro excluído com sucesso!</p>
      <?php
      }
      ?>

    <div class="container mt-4 slide-in-blurred-top">
      <div class="card">
        <table class="table table-sm table-light">
          <thead>
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Valor</th>
              <th scope="col">Descrição</th>
              <th scope="col">Objetivo</th>
              <th scope="col">Config</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include 'controler/conexaoSql.php';
            $natureza = 'receita';
            $id_usuario = $_SESSION['id_usuario'];
             $consulta = $pdo->query("SELECT * FROM `f_guardar_dinheiro` WHERE id_usuario = '$id_usuario';");
             while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
            ?>
            <tr>
              <td style="color: gray;"><?php echo $linha['data']; ?></td>
              <td><?php echo 'R$ ' . number_format($linha['valor'],2,",",".") ?></td>
              <td><?php echo $linha['descricao']; ?></td>
              <td><?php echo $linha['objetivo']; ?></td>
              <td>
                <div class="dropdown dropstart">
                  <button class="btn btn-primary btn-sm dropdown-toggle dropstart" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i><i> editar</i></button>

                  <ul class="dropdown-menu dropstart dropdown-menu-sm">
                      
                      <li>

                          <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="" onclick="loading2('editarCarteira.php?id=<?php echo $linha['id_guardar']; ?>')">

                          <i class="fa-regular fa-pen-to-square"></i> editar</a>

                      </li>

                      <li>

                        <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" onclick="loading2('controler/excluirCarteira.php?id=<?php echo $linha['id_guardar']; ?>')" >
                        <i class="fa-regular fa-rectangle-xmark"></i> excluir</a>
                        
                      </li>

                  </ul>

                </div>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>

  </body>
</html>