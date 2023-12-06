<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  

    <title>Charts</title>
    <?php
     
       
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sbav";

        $con = mysqli_connect($host, $username, $password, $dbname);
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
$sqlchart = "SELECT date_format(saledate,'%M') as Category,SUM(cost) as 'Value' from salesold GROUP BY month(saledate);";

$resultchart = $con->query($sqlchart);

$datachart = array();
if ($resultchart->num_rows > 0) {
    while ($row = $resultchart->fetch_assoc()) {
        $datachart[] = $row;
    }
}
foreach ($datachart as &$row) {
    $row['Value'] = (int)$row['Value'];

}

$con->close();
$fp = fopen('data.json', 'w');
fwrite($fp, json_encode($datachart, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
fclose($fp); 
        
    ?>
    <script>function printDiv() {
     var printContents = document.getElementById('chart').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function getValue() {
            
            var selectElement = document.getElementById("charttype");

            
            var selectedValue = selectElement.value;}
      
</script>
<style>
  

#charttype{
  padding: 10px;
}
    


body{
  overflow: auto;
  background-color: whitesmoke;
}
.container{
  margin-top: 50px;
  padding: 0px 20px;
  overflow-y: auto; 
  height: 300px; 
  max-height: 300px;
}
.selection{
  display: block;
}

      
</style>



      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var selectElement = document.getElementById("charttype");

            var selectedValue = selectElement.value;

          fetch('./data.json')
              .then(response => response.json())
              .then(jsonData => {
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Category');
                  data.addColumn('number', 'Value');

                  jsonData.forEach(item => {
                      data.addRow([item.Category, item.Value]);
                  });

                  var options = {
                      title: 'Chart Title'
                  };
                 if(selectedValue=='line')
                 {
                    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                  chart.draw(data, options);}
                  else if(selectedValue=='bar'){
                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                  }
                  else{
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                  }
                  
              })
              .catch(error => {
                  console.error('Error fetching JSON:', error);
              });
          }
  </script>
</head>

                    
        
<body>

  <h1>Charts</h1>
  <input type="button" onclick="printDiv()" value="Print" />

   
      <select name="charttype" id="charttype">
        <option value="pie">Pie Chart</option>
        <option value="line">Line Chart</option>
        <option value="bar">Bar Chart</option>
      </select>
      <button onclick="drawChart()">Display</button>

     

<div id='chart'>
            
            
    
    <div id="chart_div" style="width: 100%; height: 500px"></div>
         
</body>
    </html>
