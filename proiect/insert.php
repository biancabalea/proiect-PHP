<?php

$conn=mysqli_connect("localhost", "root", "Magazin2024") or die(mysqli_error());
mysqli_select_db($conn, "loginpagev1");

$sql_insert1="INSERT INTO map (latitudine, longitudine, description) VALUES ('45.13726561', '25.74088007','Campina')";
$sql_insert2="INSERT INTO map (latitudine, longitudine, description) VALUES ('45.64140805', '25.58066655','Brasov')";
$sql_insert3="INSERT INTO map (latitudine, longitudine, description) VALUES ('44.42937201', '26.10355008','Bucuresti')";

$retval1 = mysqli_query($conn, $sql_insert1);
$retval2 = mysqli_query($conn, $sql_insert2);
$retval3 = mysqli_query($conn, $sql_insert3);

if(!($retval1 && $retval2 && $retval3))
{
  die('Could not insert data: ' . mysqli_error());
}
echo "Data inserted successfully\n";

?>
