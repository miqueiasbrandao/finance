<?php

echo '<pre>';
print_r($_GET);
echo '</pre>';

$id_guardar = $_GET['id'];

try {

    include 'conexaoSql.php';

    $stmt = $pdo->prepare('DELETE FROM f_guardar_dinheiro WHERE id_guardar = :id_guardar');
    $stmt->bindParam(':id_guardar', $id_guardar);
    $stmt->execute();

      header('Location: ../guardarDinheiro.php?wallet=delet');
} 
catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}


?>