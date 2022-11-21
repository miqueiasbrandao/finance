<?php

session_start();

echo '<pre>';
print_r($_POST['date']);
echo '</pre>';

$registro = array();
$contador = null;


if(empty($_POST['date']) || empty($_POST['descricao']) || empty($_POST['valor'])){
    header('Location: ../despesas.php?dados=incompletos');
}

if((isset($_POST['eventual']) && isset($_POST['mensal']) && isset($_POST['parcelado'])) || (isset($_POST['eventual']) && isset($_POST['mensal']) || (isset($_POST['mensal']) && isset($_POST['parcelado'])) || (isset($_POST['parcelado']) && isset($_POST['eventual'])))){
    header('Location: ../despesas.php?tipo=false');
}

if((!empty($_POST['date']) && !empty($_POST['descricao']) && !empty($_POST['valor'])) && (isset($_POST['eventual']) || isset($_POST['mensal']) || isset($_POST['parcelado']))){
    $registro['data'] = $_POST['date'];
    $registro['descricao'] = $_POST['descricao'];
    $registro['valor'] = $_POST['valor'];
    $registro['id_usuario'] = $_SESSION['id_usuario'];
        
        if(isset($_POST['eventual'])){
            $registro['tipo'] = 'eventual';
            $registro['parcelamento'] = 'nao';
        }
        
        if(isset($_POST['mensal'])){
            $registro['tipo'] = 'mensal';
            $registro['parcelamento'] = 'nao';
        }

        if(isset($_POST['parcelado']) && isset($_POST['if_parcelamento'])){
            $registro['tipo'] = 'parcelado';
            $registro['parcelamento'] = $_POST['if_parcelamento'];
            $contador = $registro['parcelamento'];
            $contador = $contador - 1;
            $data = $_POST['date'];
            $date = date_create($data);
            date_add($date, date_interval_create_from_date_string('1 month'));
            $date = date_format($date, 'Y-m-d');
        }


        // else{
        //     header('Location: ../despesas.php?form=false');
        // }

        try {

            include 'conexaoSql.php';
            
        //inserir
        $stmt = $pdo->prepare('INSERT INTO f_registros (data, categoria, descricao, valor, parcelamento, tipo, id_usuario, natureza, pg) VALUES(:data, :categoria, :descricao, :valor, :parcelamento, :tipo, :id_usuario, :natureza, :pg)');
        $stmt->execute(array(

            ':data' => $registro['data'],
            ':categoria' => $_POST['categoria'],
            ':descricao' => $registro['descricao'],
            ':valor' => $registro['valor'],
            ':tipo' => $registro['tipo'],
            ':parcelamento' => $registro['parcelamento'],    
            ':id_usuario' => $registro['id_usuario'],
            ':natureza' => 'despesa',
            ':pg' => 'não',

            
        ));

                if($contador >= 1){
                    while ($contador >= 1) {
                        
                        //inserir
                        $stmt = $pdo->prepare('INSERT INTO f_registros (data, categoria, descricao, valor, parcelamento, tipo, id_usuario, natureza, pg) VALUES(:data, :categoria, :descricao, :valor, :parcelamento, :tipo, :id_usuario, :natureza, :pg)');
                        $stmt->execute(array(

                        ':data' => $date,
                        ':categoria' => $_POST['categoria'],
                        ':descricao' => $registro['descricao'],
                        ':valor' => $registro['valor'],
                        ':tipo' => $registro['tipo'],
                        ':parcelamento' => $contador,    
                        ':id_usuario' => $registro['id_usuario'],
                        ':natureza' => 'despesa',
                        ':pg' => 'não',
                        
                        ));
                        $contador = $contador - 1;

                        $date = date_create($date);
                        date_add($date, date_interval_create_from_date_string('1 month'));
                        $date = date_format($date, 'Y-m-d');

                    }
                    
                }


                header('Location: ../despesas.php?registro=true');
                echo $stmt->rowCount();
        } 
        catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        }

}

?>