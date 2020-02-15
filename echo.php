<?php
$con = new mysqli("localhost","id9965176_dashboarduser", "12345", "id9965176_dashboard" );
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT temperature FROM tem ORDER BY id DESC LIMIT 5";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_assoc($result))
    {
        echo "temperature";
    echo $row['temperature'];
    echo "<br>";
    }
  // Free result set
  mysqli_free_result($result);
}
$sql="SELECT hum FROM hum ORDER BY id DESC LIMIT 5";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_assoc($result))
    {
        echo "humidity";
    echo $row['hum'];
    echo "<br>";
    }
  // Free result set
  mysqli_free_result($result);
}
$sql="SELECT heat FROM heat ORDER BY id DESC LIMIT 5";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_assoc($result))
    {
        echo "heat index";
    echo $row['heat'];
    echo "<br>";
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
?>