<?php
$year = 2016;
$month = 11;
$day = 17;
$dbc = pg_connect("dbname=tomy8s port=5432 user=postgres") OR die ("Connection problem");
$db_status = pg_connection_status($dbc);
//$q = "SELECT * FROM events WHERE date = ".$year."-".$month."-".$day;
//echo $q;
//$query = pg_query_params($dbc, $q);
//if (!$query){
//    echo "No events today!";
//    exit;
//}
//echo "<br>";
//$res = pg_fetch_all($query);
//print_r($res);
//echo "<br>";
//$arr = pg_fetch_array($query);
//echo $arr[0]."<br>";
//echo $arr[1]."<br>";
//echo $arr[2]."<br>";
//echo $arr[3]."<br>";

?>