<!DOCTYPE html>
<?php
$day = $_GET['day'];
$month = $_GET['month'];
$year = $_GET['year'];
?>
<html>
    <header>
        <link rel="stylesheet" type="text/css" src="add.css">
    </header>
    <body>
        <h1>Event for <?php echo date('l, j<\s\u\p>S\</\s\u\p> F Y',mktime(0,0,0,$month,$day,$year))?></h1>
    </body>
</html>