<?php
      include 'confiq.php';
      $sql_view = "SELECT * FROM `patient_data`;";
      $res = mysqli_query($conn, $sql_view);
      $gender_m = 0;
      $gender_f = 0;
      $recovery = 0;
      $death = 0;
      $id = 0;

      while($row = mysqli_fetch_array($res)){
        if($row['death'] == 'Yes'){
        $death++;
      }
      if($row['recovery'] == "Yes"){
        $recovery++;
      }
      if($row['id']){
        $id++;
      }

      if($row['gender'] == "Male"){
        $gender_m++;
      }
      else{
        $gender_f++;
      }

      }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Patient', 'Life Status'],
          
          ['Total Affected',  <?php echo "$id"; ?>],
          ['Total Recovered',  <?php echo "$recovery"; ?>],
          ['Total Death',      <?php echo "$death"; ?>],
          ['Male Patient',  <?php echo "$gender_m"; ?>],
          ['Female Patient',  <?php echo "$gender_f"; ?>]


        ]);

        var options = {
          title: 'Corona Case in Bangladesh'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
