<?php
require('../connect_db.php');
pg_delete($dbc,'events', $_POST);
$year = substr($_POST['date'],0,4);
$month = substr($_POST['date'],5,2);
?>
Your event:<br>
<strong><?php echo $_POST['name']; ?></strong><br>
on the:<br>
<strong><?php echo date('j \o\f F, y',strtotime($_POST['date'])); ?></strong><br>
has been deleted.
<a href= <?php echo "calendar.php?month=$month&year=$year"; ?>>Return to calendar</a>