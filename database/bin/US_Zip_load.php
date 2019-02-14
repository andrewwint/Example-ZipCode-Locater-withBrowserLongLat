<?php
ini_set('memory_limit','3000M');
/*
CREATE TABLE `precise_geo_zips` (
  `id` int(11) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

$mysqli = new mysqli("localhost", "root", "local_development", "travel_agent_lookup");

$all_rows = array();
$header = null;

if (($handle = fopen("US_Zip.txt", "r")) !== FALSE) {
   while ($row = fgetcsv($handle)) {
	   if ($header === null) {
		   $header = $row;
		   continue;
	   }
	   $all_rows[] = array_combine($header, $row);
   }
$i =1;

   foreach ($all_rows as $key) {
	  $sql = "INSERT INTO precise_geo_zips (id, zip, latitude, longitude ) VALUE (". $i;
	  $sql .= ", '". $key['ZIP'] ."',"; 
	  $sql .= '"'. $key['LAT'] .'",';
	  $sql .=  $key['LNG'] ."); \n";
	  echo $sql;
	  $i++;
	  $mysqli->query($sql) or die($mysqli->error);
   }
   fclose($handle);
   $mysqli->close();
}

?>