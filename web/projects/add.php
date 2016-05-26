<?php
require('../connect_db.php');
$year = $_GET['year'];
$month = strlen($_GET['month']) == 1 ? "0".$_GET['month']:$_GET['month'];
$day = strlen($_GET['day']) == 1 ? "0".$_GET['day']:$_GET['day'];

?>
<html>
    <body>
        <h3>Add an event for the <?php echo $_GET['day'],' of ',date('F',mktime(0,0,0,$month)),' ',$year ?>
        <form action="adds.php" method="post">
            <input type="hidden" name="date" value="<?php echo $year."-".$month."-".$day; ?>">
            Name of event: <input type="text" name="name"><br>
            Description: <input type="text" name="description"><br>
            <input type="submit">
        </form>
    </body>
</html>