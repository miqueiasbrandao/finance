<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
$id_usuario = $_SESSION['id_usuario'];
$despesa = null;
$natureza = 'despesa';
include 'controler/conexaoSql.php';
$consulta= $pdo->query("SELECT * FROM f_registros WHERE natureza = '$natureza' AND id_usuario = '$id_usuario';");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $despesa += $linha['valor'];
}

$receita = null;
$natureza = 'receita';
$consulta = $pdo->query("SELECT * FROM `f_registros` WHERE natureza = '$natureza' AND id_usuario = '$id_usuario';");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $receita += $linha['valor'];
}

$guardar_dinheiro = null;
$consulta = $pdo->query("SELECT * FROM `f_guardar_dinheiro` WHERE id_usuario = '$id_usuario' AND id_usuario = '$id_usuario';");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $guardar_dinheiro += $linha['valor'];
}

?>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Despesas", <?php echo $despesa; ?>, "#ff0000"],
        ["Receita", <?php echo $receita; ?>, "#20a000"],
        ["Dinheiro Guardado", <?php echo $guardar_dinheiro; ?>, "#b7a600"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Painel Geral",
        width: 1000,
        height: 400,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
        // chartArea: {backgroundColor: '#3A546E'}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);
  }
  </script>