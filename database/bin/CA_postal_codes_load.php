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

$mysqli = new mysqli("localhost", "root", "local_development", "travel_agent_lookup_dev");

$all_rows = array();
$header = null;

if (($handle = fopen("CA_postal_codes.csv", "r")) !== FALSE) {
   while ($row = fgetcsv($handle)) {
	   if ($header === null) {
		   $header = $row;
		   continue;
	   }
	   $all_rows[] = array_combine($header, $row);
   }

   foreach ($all_rows as $key) {
	  $sql = "INSERT INTO precise_geo_zips (zip,  latitude, longitude ) VALUE (";
	  $sql .= "'". $key['PostalCode'] ."',";
	  $sql .=  $key['Latitude'] .",";
	  $sql .=  $key['Longitude'] ."); \n";
	  echo $sql;
	  $mysqli->query($sql) or die($mysqli->error);
   }
   fclose($handle);
   $mysqli->close();
}

?>
