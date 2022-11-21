<?php

$editar = array();

$editar = [
    'id' => $_POST['id'],
    'date' => $_POST['date'],
    'descricao' => $_POST['descricao'],
    'valor' => $_POST['valor'],
];

echo '<pre>';
print_r($editar);
echo '</pre>';

try {

    include 'conexaoSql.php';

    $stmt = $pdo->prepare('UPDATE f_registros SET data = :data, descricao = :descricao, valor = :valor WHERE id_registro = :id_registro');
    $stmt->bindParam(':id_registro', $editar['id']);
    $stmt->bindParam(':data', $editar['date']);
    $stmt->bindParam(':descricao', $editar['descricao']);
    $stmt->bindParam(':valor', $editar['valor']);
    $stmt->execute();

    $id = $_POST['id'];
    $consulta = $pdo->query("SELECT * FROM `f_registros` WHERE id_registro = '$id'");
    $linha = $consulta->fetch(PDO::FETCH_ASSOC);

    if($linha['natureza'] == 'despesa'){
      header('Location: ../despesas.php?edit=true');
    }
    if($linha['natureza'] == 'receita'){
      header('Location: ../receita.php?edit=true');
    }
  
    echo $stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


?>