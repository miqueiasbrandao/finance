<?php

session_start();

$registro = array();

if(empty($_POST['date']) || empty($_POST['descricao']) || empty($_POST['valor']) || empty($_POST['categoria'])){
    header('Location: ../receita.php?dados=incompletos');
}

if((!empty($_POST['date']) && !empty($_POST['descricao']) && !empty($_POST['valor']))){
    $registro['data'] = $_POST['date'];
    $registro['categoria'] = $_POST['categoria'];
    $registro['descricao'] = $_POST['descricao'];
    $registro['valor'] = $_POST['valor'];
    $registro['id_usuario'] = $_SESSION['id_usuario'];

        try {

            include 'conexaoSql.php';
            
        //inserir
        $stmt = $pdo->prepare('INSERT INTO f_registros (data, categoria, descricao, valor, id_usuario, natureza) VALUES(:data, :categoria, :descricao, :valor, :id_usuario, :natureza)');
        $stmt->execute(array(

            ':data' => $registro['data'],
            ':categoria' => $_POST['categoria'],
            ':descricao' => $registro['descricao'],
            ':valor' => $registro['valor'],  
            ':id_usuario' => $registro['id_usuario'],
            ':natureza' => 'receita'
        ));

        header('Location: ../receita.php?registro=true');
        echo $stmt->rowCount();
        } 
        catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }

}

?>