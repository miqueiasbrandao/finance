<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
$id_usuario = $_SESSION['id_usuario'];
$despesa = 0;

$natureza = 'despesa';
include 'controler/conexaoSql.php';
$consulta= $pdo->query("SELECT * FROM f_registros WHERE natureza = '$natureza' AND id_usuario = '$id_usuario';");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $despesa ++;
}


?>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Contas mensais", <?php echo $despesa; ?>, "#ff0000"],
        ["Lazer", <?php echo $despesa; ?>, "#0017ff"],
        ["Sonhos", <?php echo $despesa; ?>, "#009b20"],
        ["Gasto inesperados", <?php echo $despesa; ?>, "#779b00"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Dinheiro Guardado",
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