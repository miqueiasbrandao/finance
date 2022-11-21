<?php

$id_registro = $_GET['id'];
$pg = 'sim';
date_default_timezone_set('Brazil/East');
$_agora = date("Y-m-d");

        try {

            include 'conexaoSql.php';
        
            $stmt = $pdo->prepare('UPDATE f_registros SET pg = :pg, data_pagamento = :data_pagamento WHERE id_registro = :id_registro');
            $stmt->bindParam(':id_registro', $id_registro);
            $stmt->bindParam(':pg', $pg);
            $stmt->bindParam(':data_pagamento', $_agora);
            $stmt->execute();
        
              header("Location: ../despesas.php?pago=true");
            

            echo $stmt->rowCount();
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


?>