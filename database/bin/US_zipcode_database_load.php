<?php
ini_set('memory_limit','3000M');
/*
CREATE TABLE `geo_zips` (
  `id` int(11) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `zip_type` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `state` varchar(3) NOT NULL,
  `latitude` decimal(5,2) NOT NULL,
  `longitude` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

$mysqli = new mysqli("localhost", "root", "local_development", "travel_agent_lookup");

$all_rows = array();
$header = null;

if (($handle = fopen("free-zipcode-database.csv", "r")) !== FALSE) {
   while ($row = fgetcsv($handle)) {
	   if ($header === null) {
		   $header = $row;
		   continue;
	   }
	   $all_rows[] = array_combine($header, $row);
   }
   
   foreach ($all_rows as $key) {
	  $sql = "INSERT INTO geo_zips (zip, zip_type, city, state, latitude, longitude ) VALUE (";
	  $sql .= "'". $key['Zipcode'] ."',"; 
	  $sql .= '"'. $key['ZipCodeType'] .'",';
	  $sql .= '"'. $key['City'] .'",'; 
	  $sql .= '"'. $key['State'] .'",'; 
	  $sql .=  $key['Lat'] .","; 
	  $sql .=  $key['Long'] ."); \n";
	  echo $sql;
	  $mysqli->query($sql) or die($mysqli->error);
   }
   fclose($handle);
   $mysqli->close();
}

?>