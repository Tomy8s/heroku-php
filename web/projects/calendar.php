<?php include('../views/header.php');?>
<?php
require('../connect_db.php');
$year = isset($_GET['year']) && is_numeric($_GET['year']) && ((abs(intval($_GET['year'])) < 100) || (((abs(intval($_GET['year'])) > 1999) && abs(intval($_GET['year'])) < 3000))) ? abs(intval($_GET['year'])) : date('Y');
$month = isset($_GET['month']) && is_numeric($_GET['month']) && abs(intval($_GET['month'])) < 13 && intval($_GET['month']) != 0 ? $_GET['month'] : date('m');
$firstday = date('N', mktime(0,0,0,$month,1,$year))-1;

//I did use cal_days_in_month, but doesn't work on old versions of heroku
//Fix for heroku from https://www.webmasterworld.com/forum88/10544.htm
function days_in_month($month, $year) { 
if(checkdate($month, 31, $year)) return 31; 
if(checkdate($month, 30, $year)) return 30; 
if(checkdate($month, 29, $year)) return 29; 
if(checkdate($month, 28, $year)) return 28; 
return 0; // error 
}

$weeks = ceil(($firstday + days_in_month($month, $year))/7);
$daysprevmonth = $month == 1 ? days_in_month(12, $year - 1) : days_in_month($month - 1, $year);
$daysthismonth = days_in_month($month, $year);
?>
            <div id="calheader">
                <div id="last" class="selection">
                    <h6 class="other_month_link" id="lmonth" style="color:#222"><a href="./calendar.php?month=<?php echo $month > 1 ? $month -1 : 12?>&year=<?php echo $month >1 ? $year : $year -1?>"><?php echo date('F',mktime(0,0,0,($month > 1 ? $month -1 : 12),5)), ' <br class="mob">', ($month > 1) ? $year : $year-1;?></a></h6>
                    <h6 class="other_month_link" id="lyear" style="color:#222"><a href="./calendar.php?month=<?php echo $month?>&year=<?php echo $year -1?>"><?php echo date('F',mktime(0,0,0,$month,5)), ' <br class="mob">', $year -1;?></a></h6>
                </div>
                <div id="next" class="selection">
                    <h6 class="other_month_link" id="nmonth" style="color:#222"><a href="./calendar.php?month=<?php echo $month < 12 ? $month +1 : 1?>&year=<?php echo $month < 12 ? $year : $year +1?>"><?php echo date('F',mktime(0,0,0,($month < 12 ? $month +1 : 1),5)), ' <br class="mob">', ($month < 12) ? $year : $year +1;?></a></h6>
                    <h6 class="other_month_link" id="nyear" style="color:#222"><a href="./calendar.php?month=<?php echo $month?>&year=<?php echo $year +1?>"><?php echo date('F',mktime(0,0,0,$month,5)), ' <br class="mob">', $year +1;?></a></h6>
                </div>
                <h1>Calendar for <?php echo date('F',mktime(0,0,0,$month,5)), ' ', $year;?></h1>
            </div>
        <div id="calendar">
            <div id="day_names">
                <ul>
                    <?php for ($d = 0; $d < 7; $d ++){
                        echo '<li>', date('l', mktime(0,0,0,0,$d)), '</li>';
                    }?>
        
                </ul>
            </div>
            <div id="dates"><?php
            for ($week = 1; $week <= $weeks; $week ++){
                echo '
                <ul class="dates" id="week', $week,'">
                ';
                for ($day = 7*($week-1)-($firstday-1); $day < 7*$week-($firstday-1); $day ++){
                    echo '<li class="', ($day > 0) && ($day <= $daysthismonth) ? '' : 'not-', 'this-month">
                       ';
                        echo '<p class="dateno"><span class="datenum">', $day < 1 ? $daysprevmonth + $day : ($day > $daysthismonth ? $day - $daysthismonth : $day), '</span>';
                        if (($day > 0) && ($day <= $daysthismonth)){
                            echo '  <a href="./add.php?day=', $day, '&month=', $month, '&year=', $year, '" class="adddiv" onclick="showiframe()">';
                            echo '      <span class="plus">&nbsp+&nbsp</span><span class="add">add event</span>';
                            echo '  </a>';
                        }
                        echo '</p>';
                        $pgday = $day < 1 ? $daysprevmonth + $day : ($day > $daysthismonth ? $day - $daysthismonth : $day);
                        $pgmonth = $day < 1 ? ($month > 1 ? $month - 1 : 12) : ($day > $daysthismonth ? ($month < 12 ? $month + 1 : 1): $month);
                        $pgyear = ($day < 1 && $month == 1) ? $year - 1 : (($day > $daysthismonth && $month == 12)? $year + 1 : $year);
                        $query = pg_select($dbc, 'events', array("date"=>$pgyear."-".$pgmonth."-".$pgday));
                        if ($query){
                            foreach($query as $i){
                                echo '<div class="event"><h4  alt="'.$i['description'].'"onclick="if (document.getElementById(\'desc'.$i['id'].'\').style.display == \'block\'){document.getElementById(\'click'.$i['id'].'\').style.display = \'inline\';document.getElementById(\'desc'.$i['id'].'\').style.display = \'none\';document.getElementById(\'small'.$i['id'].'\').style.display = \'none\';}else{document.getElementById(\'desc'.$i['id'].'\').style.display = \'block\';document.getElementById(\'small'.$i['id'].'\').style.display = \'inline\';document.getElementById(\'click'.$i['id'].'\').style.display = \'none\';}">'.$i['name'];
                                echo '<small id="click'.$i['id'].'" class="click"> | Click for details</small>';
                                echo '<small id="small'.$i['id'].'"> | <a href="javascript:document.getElementById(\'delId'.$i['id'].'\').submit()">Delete</a></small>';
                                echo '</h4><p id="desc'.$i['id'].'">'.$i['description'].'</p></div>';
                                echo '<form action="./delete.php" method="post" id="delId'.$i['id'].'">';
                                echo '<input type="hidden" name="id" value="'.$i['id'].'">';
                                echo '<input type="hidden" name="date" value="'.$i['date'].'">';
                                echo '<input type="hidden" name="name" value="'.$i['name'].'">';
                                echo '<input type="hidden" name="description" value="'.$i['description'].'">';
                                echo '</form>';
                            }
                        }
                       
                    echo '<br class="mob"></li>';
                }
    
        echo '</ul>';
            }?>
            
            </div><!--dates-->
        </div><!--calendar-->
        <iframe name="iframe_add" id="iframe" src="maths.php" align="middle"></iframe>
        
        <script src="add.js"></script>


<?php include('../views/footer.html');?>