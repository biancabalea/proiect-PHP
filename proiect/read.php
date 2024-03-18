<?php

$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($conn, "pai");

$sql_read = "SELECT * FROM map";

$result = mysqli_query($conn, $sql_read);
if(! $result )
{
  die('Could not read data: ' . mysqli_error());
}
	echo "<table>";
	echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Latitude</th>";
    echo "<th>Longitude</th>";
	echo "</tr>";
	
while($row = mysqli_fetch_array($result)) {
	$id = $row['id'];
	$lat = $row['latitudine'];
	$long = $row['longitudine'];
	
	echo "<tr>";
	echo "<td>$id</td>";
    echo "<td>$lat</td>";
    echo "<td>$long</td>";
	echo "</tr>";
}
?>