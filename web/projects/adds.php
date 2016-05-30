<?php
require('../connect_db.php');
pg_insert($dbc, 'events', $_POST);
$year = substr($_POST['date'],0,4);
$month = substr($_POST['date'],5,2);
?>
<h3>Your event has been created</h3>
Date: <?php echo date('j F, y',strtotime($_POST['date'])); ?><br>
Event: <?php echo $_POST['name'] ?><br>
Description: <?php echo $_POST['description'] ?><br>
<a href= <?php echo "calendar.php?month=$month&year=$year"; ?>>Return to calendar</a>
