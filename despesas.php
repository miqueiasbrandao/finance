<?php
include 'controler/validaSession.php';
?>

<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'inc/head.php'; ?>
    <title>Despesas</title>
  </head>
  <body style="background-color: #3A546E;">
  <?php include 'inc/nav.php'; ?>
  <?php include 'inc/modal.php'; ?>

  <div id="page">

    <div class="container my-3 fade-in">

      <div class="row">

        <div class="col-md">

          <h3 style="color: white;">

            Despesas / 

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('despesas.php')" class="btn btn-primary btn-sm">

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

          <div class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#despesas">+Add despesas</div>

        </div>

      </div>

      <?php
      if(isset($_GET['pago']) && $_GET['pago'] == "true"){
      ?>
        <p class="text-center alert alert-success mt-2" role="alert">Despesa alterado para 'PAGO'!</p>
      <?php
      }

      if(isset($_GET['edit']) && $_GET['edit'] == "true"){
      ?>
        <p class="text-center alert alert-success mt-2" role="alert">Registro alterado com sucesso!</p>
      <?php
      }

      if(isset($_GET['registro']) && $_GET['registro'] == "excluido"){
      ?>
        <p class="text-center alert alert-success mt-2" role="alert">Registro excluído com sucesso!</p>
      <?php
      }

      if(isset($_GET['dados']) && $_GET['dados'] == "incompletos"){
      ?>
        <p class="text-center alert alert-danger mt-2" role="alert">Dados Incompletos! Tente novamente!</p>
      <?php
      }

      if(isset($_GET['tipo']) && $_GET['tipo'] == "false"){
      ?>
        <p class="text-center alert alert-danger mt-2" role="alert">So é permitido um tipo de despesa! Tente novamente!</p>
      <?php
      }

      if(isset($_GET['form']) && $_GET['form'] == "false"){
      ?>
        <p class="text-center alert alert-danger mt-2" role="alert">Não foi possivel concluir o formulario! Tente novamente!</p>
      <?php
      }

      if(isset($_GET['registro']) && $_GET['registro'] == "true"){
      ?>
        <p class="text-center alert alert-success mt-2" role="alert">Despesa inserida com sucesso!</p>
      <?php
      }
      ?>

    </div>


    <div class="container mt-4 slide-in-blurred-top">
      <div class="card">
        <table class="table table-sm table-light">
          <thead>
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Categoria</th>
              <th scope="col">Descrição</th>
              <th scope="col">Valor</th>
              <th scope="col">Parcelamento(faltam)</th>
              <th scope="col">Tipo</th>
              <th scope="col">Config</th>
              <th scope="col">Pago?</th>
              <th scope="col">Data pagamento</th>
            </tr>
          </thead>
          <tbody>

            <?php
            include 'controler/conexaoSql.php';
            $natureza = 'despesa';
            $id_usuario = $_SESSION['id_usuario'];
             $consulta = $pdo->query("SELECT * FROM `f_registros` WHERE natureza = '$natureza' AND id_usuario = '$id_usuario';");
             while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
            ?>
            <tr>
              <td style="color: gray;"><?php echo $linha['data']; ?></td>
              <td><?php echo $linha['categoria']; ?></td>
              <td><?php echo $linha['descricao']; ?></td>
              <td><?php echo 'R$ ' . number_format($linha['valor'],2,",",".") ?></td>
              <td>
                <?php 
                if($linha['parcelamento'] == "0"){
                  ?><span style="font-size: 11px;"><i>Não</i></span><?php
                }
                if($linha['parcelamento'] != "0"){
                  echo $linha['parcelamento']; ?> <span style="font-size: 11px;"><i>vezes</i></span> <?php
                } 
                ?>
              </td>
              <td><?php echo $linha['tipo']; ?></td>
              <td>
                <div class="dropdown dropstart">
                  <button class="btn btn-primary btn-sm dropdown-toggle dropstart" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-gear"></i><i> editar</i></button>

                  <ul class="dropdown-menu dropstart dropdown-menu-sm">
                      
                      <li>

                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('editarRegistro.php?id=<?php echo $linha['id_registro']; ?>')">

                          <i class="fa-regular fa-pen-to-square"></i> editar</a>

                      </li>

                      <li>

                        <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" onclick="loading2('controler/excluirRegistro.php?id=<?php echo $linha['id_registro']; ?>')" >
                        <i class="fa-regular fa-rectangle-xmark"></i> excluir</a>
                        
                      </li>

                  </ul>

                </div>
              </td>

              <td>
                <?php
                if($linha['pg'] == 'não'){?>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="loading2('controler/marcarPago.php?id=<?php echo $linha['id_registro']; ?>')" class="btn btn-danger btn-sm"><i class="fa-regular fa-square-minus"></i> Pagar</button>
                <?php } 
                
                if($linha['pg'] == 'sim'){ ?>
                  <button class="btn btn-success btn-sm disabled"><i class="fa-solid fa-check"></i> Sim</button>
                <?php } ?>
              </td>

              <td style="font-size: 13px;" class="text-center">
              <?php
              if($linha['data_pagamento'] == '0000-00-00'){
              echo '';
              }
              if($linha['data_pagamento'] != '0000-00-00'){
                echo $linha['data_pagamento'];
              } 
              
              ?>
              
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