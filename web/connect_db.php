<?php
$dbc = pg_connect("host=ec2-107-20-136-89.compute-1.amazonaws.com dbname=df6n79i1l52io6 port=5432 user=naltswuvytqnpe password=u9n8ZU4gTDStgzclTgzyDwLFay") OR die ("Connection problem");
$db_status = pg_connection_status($dbc);
//$query = pg_select($dbc, 'events', array("date"=>"2016-11-17"));
//print_r($query);
?>