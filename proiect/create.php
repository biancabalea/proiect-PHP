<?php

$conn=mysqli_connect("localhost", "root", "Magazin2024") or die(mysqli_error());
mysqli_select_db($conn, "loginpagev1");

$sql_create = "CREATE TABLE map
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
latitudine varchar(20) NOT NULL,
longitudine varchar(20) NOT NULL,
description varchar(200) NOT NULL
)
";

$retval = mysqli_query($conn, $sql_create);
if(! $retval )
{
  die('Could not create table: ' . mysqli_error());
}
echo "Table created successfully\n";


?>