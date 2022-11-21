<?php

session_start();

echo '<pre>';
print_r($_SESSION);
echo '<pre>';

echo '<pre>';
print_r($_POST);
echo '<pre>';

if(!isset($_POST['data']) || !isset($_POST['valor']) || !isset($_POST['descricao']) || empty($_POST['data']) || empty($_POST['valor']) || empty($_POST['descricao'])){
    header('Location: ../receita.php?dinheiro=false');
    exit;
} 


        try {

            include 'conexaoSql.php';
            
        //inserir
        $stmt = $pdo->prepare('INSERT INTO f_guardar_dinheiro (data, valor, descricao, objetivo, id_usuario) VALUES(:data, :valor, :descricao, :objetivo, :id_usuario)');
        $stmt->execute(array(
            ':data' => $_POST['data'],
            ':valor' => $_POST['valor'],
            ':descricao' => $_POST['descricao'],  
            ':objetivo' => $_POST['objetivo'],
            ':id_usuario' => $_SESSION['id_usuario']
        ));

        header('Location: ../guardarDinheiro.php?dinheiroguardado=true');
        echo $stmt->rowCount();
        } 
        catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }



?>