<?php
require('../connect_db.php');
pg_insert($dbc, 'events', $_POST);
?>
<h3>Your event has been created</h3>
Date: <?php echo $_POST['date'] ?><br>
Event: <?php echo $_POST['name'] ?><br>
Description: <?php echo $_POST['description'] ?><br>
<a href="calendar.php">Return to calendar</a>
