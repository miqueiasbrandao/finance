<?php

echo '<pre>';
print_r($_POST);
echo '<pre>';

$login = $_POST['login'];
$senha = null;
$grupo_usuario = null;

if(empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['senha2'])){
    header('Location: ../createUser.php?create=erro001');
    exit;
}

if(!empty($_POST['login']) || !empty($_POST['senha']) || !empty($_POST['senha2'])){

    if($_POST['senha'] != $_POST['senha2']){
        header('Location: ../createUser.php?password=erro001');
        exit;
    }

    if($_POST['senha'] == $_POST['senha2']){
        $senha = $_POST['senha'];

        include 'conexaoSql.php'; 
        $stmt = $pdo->prepare('INSERT INTO usuarios (usuario, senha, grupo_usuario) VALUES(:usuario, :senha, :grupo_usuario)');
        $stmt->execute(array(
    
            ':usuario' => $login,
            ':senha' => $senha,
            ':grupo_usuario' => 2,
        ));

        header('Location: ../index.php?user=add');
        
    }
        
}    
    else{
    header('Location: ../createUser.php?user=false');
    }
?>




?>