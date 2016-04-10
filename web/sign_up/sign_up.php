<?php
//By T. Yates
require_once('settings.php');
echo $fna = $_POST['fname'];
echo $sna = $_POST['sname'];
echo $pen = $_POST['penis'] == 'yes'? 1 : 0;
echo $nna = $_POST['nname'];
echo $una = $_POST['uname'];
echo $pas = $_POST['pword'];
echo $ema = $_POST['email'];
echo $dob = $_POST['dob'];
echo $loc = $_POST['loc'];
echo $tim = intval($_POST['tz']);

//print_r($_POST);

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
print '<br>'.($connection) ? 'connected' : mysqli_connect_error() ;
//mysql_query("INSERT INTO `site`.`user_info` VALUES (NULL,'$fna','$sna','$pen','$una','$pas','$ema','$dob','$loc','$tim');");
echo mysql_query("SELECT * FROM `site`.`user_info`");
//By T. Yates
?>