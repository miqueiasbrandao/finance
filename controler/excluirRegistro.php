<?php

echo '<pre>';
print_r($_GET);
echo '<pre>';

$id_registro = $_GET['id'];

include 'conexaoSql.php';
$consulta = $pdo->query("SELECT * FROM `f_registros` WHERE id_registro = $id_registro;");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);


try {

    include 'conexaoSql.php';

    $stmt = $pdo->prepare('DELETE FROM f_registros WHERE id_registro = :id_registro');
    $stmt->bindParam(':id_registro', $id_registro);
    $stmt->execute();


    if($linha['natureza'] == 'despesa'){
      header('Location: ../despesas.php?registro=excluido');
    }

    if($linha['natureza'] == 'receita'){
      header('Location: ../receita.php?registro=excluido');
    }
} 
catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}


?>