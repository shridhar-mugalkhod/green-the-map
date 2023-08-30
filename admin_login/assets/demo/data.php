<?php
header('Content-Type: application/json');
$db=mysqli_connect("localhost","root","","green");

$sqlQuery = "SELECT location,COUNT(location) AS count FROM complaints GROUP BY location";

$result = mysqli_query($db,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($db);

echo json_encode($data);
?>