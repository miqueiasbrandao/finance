<?php

session_start();

echo '<pre>';
print_r($_POST);
echo '<pre>';

$login = $_POST['login'];
$senha = $_POST['senha'];
$usuarioAutenticado = false;

include 'conexaoSql.php';
$consulta = $pdo->query("SELECT * FROM usuarios WHERE usuario = '$login'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

    if(isset($linha['usuario']) && !empty($linha['usuario'])){
        if($_POST['senha'] == $linha['senha']){
            $usuarioAutenticado = true;
                if($usuarioAutenticado == true){
                    $_SESSION['id_usuario'] = $linha['id_usuario'];
                    $_SESSION['usuario'] = $linha['usuario'];
                    $_SESSION['senha'] = $linha['senha'];
                    $_SESSION['grupo_usuario'] = $linha['grupo_usuario'];
                    $_SESSION['usuarioAutenticado'] = 'SIM';
                    header('Location: ../home.php');
                }
        }
        else{
            header('Location: ../index.php?autenticado=false');
        }
    }

    else{
        header('Location: ../index.php?autenticado=false');
    }

echo '<hr>';
echo '<pre>';
print_r($_SESSION);
echo '<pre>';

?>