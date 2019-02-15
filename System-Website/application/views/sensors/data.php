<div class="row no-gutters">
  <div class="col-xl-9">

    <!-- CHART -->
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['datetime_val','<?php echo $title?>'],
          <?php
          foreach ($values as $row) {
            echo "['".$row['datetime_val']."', ".$row[$sensor]."],";
          }
          ?>
        ]);

        var options = {
          title: '<?php echo $title?> ajan funktiona',
          //curveType: 'function',
          vAxis: { minValue: 0 , maxValue: <?php echo $max?> , title: "<?php echo $unit?>"},
          hAxis: { title: 'Aika'},
          legend: { position: 'none' },
          chartArea : { left: "15%" , right: "10%", top: "10%", bottom: "20%"}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }



      $(window).resize(function(){
        drawChart();
      });
      </script>
    </head>

    <body>
      <div id="curve_chart" style="width: 100%; height: 740px"></div>
      <!--
      <div id="curve_chart" style="width: 900px; height: 480px"></div>
    -->
  </body>
</div>

<div class="col-xl-3 scrollable border">

  <!-- TABLE -->
  <!-- Center table text -->
  <style> .google-visualization-table-td { text-align: center !important; } </style>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Aika');
      data.addColumn('number', '<?php echo $title ?>');
      data.addRows([
        <?php
        foreach ($values as $row) {
          echo "['".$row['datetime_val']."', ".$row[$sensor]."],";
        }
        ?>
      ]);

      var table = new google.visualization.Table(document.getElementById('table_div'));

      var options = {
        width: '100%',
        height: '100%',
      };

      table.draw(data, options);
    }
    </script>
  </head>

  <body>
    <div id="table_div"></div>
  </body>

</div>
</div>
