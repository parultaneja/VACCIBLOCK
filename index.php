<?php
 
header("Refresh: 4; url=index.php");
 
 ?>
<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script type="text/javascript" src="js/clock.js"></script>
    <title>Dashboard</title>
  </head>
  <body>
      <?php
$con = new mysqli("localhost","id9965176_dashboarduser", "12345", "id9965176_dashboard" );
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
      <div class="dashboard">
    <h1>DASHBOARD</h1>
      </div>
            <div class="row py-0 head" >
            <div class="col-6">
                <div class="location">
                <p class="my-4"><img src="images/placeholder.png" alt=""> <span id="city"></span></p>
            </div>
            </div>
            <div class="col-6  dt">
                <div class="date my-2">
                <!--<p ><img src="images/calendar.png" alt="" height="22px;>date</p>-->
              
                <!--<p><img src="images/alarm-clock.png" alt=""  height="22px;"> Current Time</p>-->
                <!--<div class="a">-->
                  <!--<img src="images/alarm-clock.png" alt=""  height="22px;">-->
                  
                  <p id="clock" class="t"></p>
                  <!--</div>-->
                </div>
            </div>
            </div>
            <div class="row read1">
                <div class="col-lg-4 col-md-12 dht-r">
                    <p> Reading of DHT</p>
                    <div class="aqi1">
                            <div class="box1">
                                    <p style="color:white"> <img src="images/thermometer.png" alt="" height="30px;">
                                    <?php
                                    $sql="SELECT temperature,time FROM tem ORDER BY id DESC LIMIT 2 ";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  $row=mysqli_fetch_assoc($result);
//     {
        // echo "temperature";
    echo $row['temperature'];
    echo " c";
    // echo "<br>";
    // }
  // Free result set
  mysqli_free_result($result);
}
?>
                                    </p>
                                </div>
                            <div class="box2">
                                    <p style="color: white"><img src="images/humidity.png" alt=""> 
                                    <?php
                                    $sql="SELECT hum,time FROM hum ORDER BY id DESC LIMIT 2 ";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  $row=mysqli_fetch_assoc($result);
//     {
        // echo "";
    echo $row['hum'];
    echo " %";
    // echo "<br>";
    // }
  // Free result set
  mysqli_free_result($result);
}
?>
                                    
                                    </p>
                                </div>
                            <div class="box3">
                                    <p style="color: white"><img src="images/wind.png" alt="">
                                    <?php
                                    $sql="SELECT heat,time FROM heat ORDER BY id DESC LIMIT 2 ";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  $row=mysqli_fetch_assoc($result);
//     {
        // echo "";
    echo $row['heat'];
    echo " %";
    // echo "<br>";
    // }
  // Free result set
  mysqli_free_result($result);
}
?>
                                    
                                    </p>
                                </div>
                            </div>
                            
                </div>
                <div class="col-lg-8 col-md-12 line-graph">
                   <!-- <p>Line graphs</p> -->
                   <div class="row">
                        <div class="col-lg-6 col-md-12">
                     <div id="linechart1" style="width: 430px; height: 300px;"></div>
                 </div>
                 <div class=" col-lg-6 col-md-12">
                     <div id="linechart2" style="width: 430px; height: 300px;"></div>
                 </div>
                     <!-- <div id="chart_div"></div> -->
                 </div>
                </div>
            </div>
            <div class="row read2">
                    <div class="col-lg-4 col-md-12 aqi-r">
                        <p> Reading of AQI</p>
                        <div class="aqi">
                        <div class="box">
                                <p style="color: white"> <img src="images/air-pollution.png" alt="" height="50px">
                                 <?php
                                    $sql="SELECT aqi,time FROM aqi ORDER BY id DESC LIMIT 2 ";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  $row=mysqli_fetch_assoc($result);
//     {
        // echo "";
    echo $row['aqi'];
    echo " ppm";
    // echo "<br>";
    // }
  // Free result set
  mysqli_free_result($result);
}
?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 pie-graph">
                       <!-- <p>Pie graphs</p> -->
                       <!-- <iframe src="graph.html" frameborder="0"  style="position:absolute; top:0; left: 0"></iframe> -->
                       <div class="a">
                           <div class="row">
                               <div class="col-lg-6 col-md-12">
                            <div id="linechart3" style="width: 430px; height: 300px;"></div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div id="linechart4" style="width: 430px; height: 300px;"></div>
                        </div>
                            <!-- <div id="chart_div"></div> -->
                        </div>
                       </div>
                    </div>
                </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript" src="js/clock.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart',"line"]});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  // data.addColumn('number');
  var data1 = google.visualization.arrayToDataTable([
  ['time', 'temperature'],
  <?php 
     // $N = "SELECT id,concentration,time FROM chart";
     //LIMIT 10 OFFSET N-10
      $query = "SELECT temperature,time FROM tem ORDER BY id DESC LIMIT 5";
    //  $query = "SELECT TOP (10)  FROM chart WHERE concentration = 3";
 

       $exec = mysqli_query($con,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['time']."',".$row['temperature']."],";
       }
       ?> 
]);

  // Optional; add a title and set the width and height of the chart
  // var options = {'title':'My Average Day', 'width':550, 'height':400,'color':'yellow'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.LineChart(document.getElementById('linechart1'));
  chart.draw(data1,options1)
}
var options1 = {
    title: 'TUMPERATURE',
    // backgroundColor: 'red',
    legendTextStyle: { color: 'orange' },
    titleTextStyle: { color: 'green' },
    titleTextStyle: { color: 'green' },
    hAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
     
    vAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
    backgroundColor: { fill: "black" } 
  };

</script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart',"line"]});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  // data.addColumn('number');
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  <?php 
     // $N = "SELECT id,concentration,time FROM chart";
     //LIMIT 10 OFFSET N-10
      $query = "SELECT hum,time FROM hum ORDER BY id DESC LIMIT 5";
    //  $query = "SELECT TOP (10)  FROM chart WHERE concentration = 3";
 

       $exec = mysqli_query($con,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['time']."',".$row['hum']."],";
       }
       ?> 
]);

  // Optional; add a title and set the width and height of the chart
  // var options = {'title':'My Average Day', 'width':550, 'height':400,'color':'yellow'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.LineChart(document.getElementById('linechart2'));
  chart.draw(data,options)
}
var options = {
    title: 'HUMIDITY',
    // backgroundColor: 'red',
    legendTextStyle: { color: 'orange' },
    titleTextStyle: { color: 'green' },
    titleTextStyle: { color: 'green' },
    hAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
     
    vAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
    backgroundColor: { fill: "black" } 
  };

</script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart',"line"]});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  // data.addColumn('number');
  var data3 = google.visualization.arrayToDataTable([
  ['heat', 'time'],
  <?php 
     // $N = "SELECT id,concentration,time FROM chart";
     //LIMIT 10 OFFSET N-10
      $query = "SELECT heat,time FROM heat ORDER BY id DESC LIMIT 5";
    //  $query = "SELECT TOP (10)  FROM chart WHERE concentration = 3";
 

       $exec = mysqli_query($con,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['time']."',".$row['heat']."],";
       }
       ?> 
]);

  // Optional; add a title and set the width and height of the chart
  // var options = {'title':'My Average Day', 'width':550, 'height':400,'color':'yellow'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.LineChart(document.getElementById('linechart3'));
  chart.draw(data3,options3)
}
var options3 = {
    title: 'HEAT INDEX',
    // backgroundColor: 'red',
    legendTextStyle: { color: 'orange' },
    titleTextStyle: { color: 'green' },
    titleTextStyle: { color: 'green' },
    hAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
     
    vAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
    backgroundColor: { fill: "black" } 
  };

</script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart',"line"]});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  // data.addColumn('number');
  var data4 = google.visualization.arrayToDataTable([
  ['time', 'AQI'],
  <?php 
     // $N = "SELECT id,concentration,time FROM chart";
     //LIMIT 10 OFFSET N-10
      $query = "SELECT aqi,time FROM aqi ORDER BY id DESC LIMIT 5";
    //  $query = "SELECT TOP (10)  FROM chart WHERE concentration = 3";
 

       $exec = mysqli_query($con,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['time']."',".$row['aqi']."],";
       }
       ?> 
]);

  // Optional; add a title and set the width and height of the chart
  // var options = {'title':'My Average Day', 'width':550, 'height':400,'color':'yellow'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.LineChart(document.getElementById('linechart4'));
  chart.draw(data4,options4)
}
var options4 = {
    title: 'AQI',
    // backgroundColor: 'red',
    legendTextStyle: { color: 'orange' },
    titleTextStyle: { color: 'green' },
    titleTextStyle: { color: 'green' },
    hAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
     
    vAxis: {
      textStyle:{color: 'red'},
      gridlines: { count: 10 } 
    },
    backgroundColor: { fill: "black" } 
  };

</script>

<script>
        $.ajax({
            url: "https://geoip-db.com/jsonp",
            jsonpCallback: "callback",
            dataType: "jsonp",
            success: function( location ) {
                $('#country').html(location.country_name);
                $('#state').html(location.state);
                $('#city').html(location.city);
                $('#latitude').html(location.latitude);
                $('#longitude').html(location.longitude);
                $('#ip').html(location.IPv4);  
            }
            
        });   
        console.log("a");  
    </script>
                
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>