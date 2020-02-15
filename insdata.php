<?php
	// Create connection
$conn = new mysqli("localhost","id9965176_dashboarduser", "12345", "id9965176_dashboard" );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*echo "Connected successfully <br>";*/

$temperature = $_GET['temperature'];
// $hum = $_GET['hum'];
$hum = 22;
// $heat = $_GET['heat'];
$heat = 54;
// $idprf = $_GET['idprf'];
// $aqi = $_GET['aqi'];
$aqi = 34;
// $id = $_GET['id'];

$query = "INSERT INTO table1 (city,temperature,hum,heat,aqi)
VALUES ('faridabad','$temperature','$hum','$heat','$aqi');)";
$result = mysqli_query($conn, $query);
if(isset($result)){
echo "registered";	
}

?>