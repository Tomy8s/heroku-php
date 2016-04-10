<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../stylesheets/style.css">
</head>
<body></body>
<?php
$year = isset($_GET['year']) && is_numeric($_GET['year']) && ((abs(intval($_GET['year'])) < 100) || (((abs(intval($_GET['year'])) > 1999) && abs(intval($_GET['year'])) < 3000))) ? abs(intval($_GET['year'])) : date('Y');
$month = isset($_GET['month']) && is_numeric($_GET['month']) && abs(intval($_GET['month'])) < 13 && intval($_GET['month']) != 0 ? $_GET['month'] : date('m');
$firstday = date('N', mktime(0,0,0,$month,1,$year))-1;
$weeks = ceil(($firstday + cal_days_in_month(CAL_GREGORIAN, $month, $year))/7);
$daysprevmonth = $month == 1 ? cal_days_in_month(CAL_GREGORIAN, 12, $year - 1) : cal_days_in_month(CAL_GREGORIAN, $month - 1, $year);
$daysthismonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
?>
        <iframe name="iframe_add" id="iframe" align="middle"></iframe>
        <header>
            <div id="header">
                <div id="last" class="selection">
                    <h6 class="other_month_link" id="lmonth"><a href="./calendar.php?month=<?php echo $month > 1 ? $month -1 : 12?>&year=<?php echo $month >1 ? $year : $year -1?>"><?php echo date('F',mktime(0,0,0,($month > 1 ? $month -1 : 12))), ' ', ($month > 1) ? $year : $year-1;?></a></h6>
                    <h6 class="other_month_link" id="lyear"><a href="./calendar.php?month=<?php echo $month?>&year=<?php echo $year -1?>"><?php echo date('F',mktime(0,0,0,$month)), ' ', $year -1;?></a></h6>
                </div>
                <h1>Calendar for <?php echo date('F',mktime(0,0,0,$month)), ' ', $year;?></h1>
                <div id="next" class="selection">
                    <h6 class="other_month_link" id="nmonth"><a href="./calendar.php?month=<?php echo $month < 12 ? $month +1 : 1?>&year=<?php echo $month < 12 ? $year : $year +1?>"><?php echo date('F',mktime(0,0,0,($month < 12 ? $month +1 : 1))), ' ', ($month < 12) ? $year : $year +1;?></a></h6>
                    <h6 class="other_month_link" id="nyear"><a href="./calendar.php?month=<?php echo $month?>&year=<?php echo $year +1?>"><?php echo date('F',mktime(0,0,0,$month)), ' ', $year +1;?></a></h6>
                </div>
            </div>
        </header>
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
                    echo '    <li class="', ($day > 0) && ($day <= $daysthismonth) ? '' : 'not-', 'this-month">
                       ';
                        echo '<p class="dateno"><span class="datenum">', $day < 1 ? $daysprevmonth + $day : ($day > $daysthismonth ? $day - $daysthismonth : $day), '</span>';
                        echo '  <a href="./add.php?day=', $day, '&month=', $month, '&year=', $year, '" target="iframe_add"class="adddiv">';
                        echo '      <span class="plus">&nbsp+&nbsp</span><span class="add">add event</span>';
                        echo '  </a>';
                        echo <<<END
                    
                       </p>
                       <p class="event">                                     
                       </p>
                       <p class="time">                        
                       </p>   
                    </li>
                
END;
                }
    
        echo '</ul>';
            }?>
            
            </div><!--dates-->
        </div><!--calendar-->
</body>