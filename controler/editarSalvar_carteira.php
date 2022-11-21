<?php

$editar = array();

$editar = [
    'id' => $_POST['id'],
    'date' => $_POST['date'],
    'valor' => $_POST['valor'],
    'descricao' => $_POST['descricao'],
    'objetivo' => $_POST['objetivo'],
];

echo '<pre>';
print_r($_POST);
echo '</pre>';

try {

    include 'conexaoSql.php';

    $stmt = $pdo->prepare('UPDATE f_guardar_dinheiro SET data = :data, valor = :valor, descricao = :descricao, objetivo = :objetivo WHERE id_guardar = :id_guardar');
    $stmt->bindParam(':id_guardar', $editar['id']);
    $stmt->bindParam(':data', $editar['date']);
    $stmt->bindParam(':valor', $editar['valor']);
    $stmt->bindParam(':descricao', $editar['descricao']);
    $stmt->bindParam(':objetivo', $editar['objetivo']);
    $stmt->execute();

    header('Location: ../guardarDinheiro.php?alteracao=true');
  
    echo $stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


?>