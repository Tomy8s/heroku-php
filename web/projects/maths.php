<?php include('../views/header.html');?>
<?php
if (!(((isset($_GET['+']))||(isset($_GET['-']))||(isset($_GET['x']))||(isset($_GET['÷']))))&&(isset($_GET['min1']))&&(isset($_GET['max1']))&&(isset($_GET['min2']))&&(isset($_GET['max2']))&&(isset($_GET['minA']))&&(isset($_GET['maxA']))){
    echo 'Please go <a href="maths.html">back</a> and check your settings.';
}else{
$mi1 = $_GET['min1'];
$ma1 = $_GET['max1'];
$ml1 = $_GET['mlt1'];
$mi2 = $_GET['min2'];
$ma2 = $_GET['max2'];
$ml2 = $_GET['mlt2'];
$miA = $_GET['minA'];
$maA = $_GET['maxA'];
//$mlA = $_GET['mltA'];
$noQ = $_GET['questions'];
$ops = array(' + ',' - ',' x ',' ÷ ');
if (!isset($_GET['+'])) unset($ops[0]);
if (!isset($_GET['-'])) unset($ops[1]);
if (!isset($_GET['x'])) unset($ops[2]);
if (!isset($_GET['÷'])) unset($ops[3]);
    echo '<table id="table"><tr>';
    while ($noQ > 0) {
        $n1 = rand($mi1,$ma1);
        $op = array_rand($ops);
        if ($op == 0){
            $n1 = (rand(max($mi1,$miA-$mi2)/$ml1,min($ma1,$maA-$mi2)/$ml1))*$ml1;
            $n2 = (rand(max($mi2,$miA-$n1)/$ml2,min($ma2,$maA-$n1)/$ml2))*$ml2;
        }elseif ($op == 1){
            $n1 = (rand(max($mi1,$miA+$mi2)/$ml1,min($ma1,$maA-$mi2)/$ml1))*$ml1;
            $n2 = (rand(max($mi2,$miA-$n1)/$ml2,min($ma2,$n1-$miA)/$ml2))*$ml2;
        }elseif ($op == 2){
            $n1 = (rand(max($mi1,ceil($miA/$ma2))/$ml1,min($ma1,($mi2 == 0)? $maA : floor($maA/$mi2))/$ml1))*$ml1;
            $n2 = (rand(max($mi2,($n1 ==0)? $mi2 : ceil($miA/$n1))/$ml2,min($ma2,($n1 ==0)? $ma2 : floor($maA/$n1))/$ml2))*$ml2;
        }elseif ($op == 3){
            if ($mi2 == 0) $mi2 = 1;
            if ($ma2 == 0) $ma2 = 1;
            $n1 = (rand(max($mi1,$miA*$ma2)/$ml1,min($ma1,$mi2*$maA)/$ml1))*$ml1;
            $n2 = (rand(max($mi2,$n1*$miA)/$ml2,min($ma2,$n1*$maA)/$ml2))*$ml2;
        }else{
            $n2 = rand($mi2,$ma2);
        }
        if (isset($_GET['flip']) && $_GET['flip'] == 'on' && ($op % 2 == 0) && rand(0,1) == 1){
            $tmp = $n1;
            $n1 = $n2;
            $n2 = $tmp;
        }
        isset($_GET['qNo']) && $_GET['qNo'] == 'on' ? $qNo = $_GET['questions'] - $noQ + 1 : $qNo = '';
        echo '<td>',$qNo,'</td><td>',$n1,$ops[$op],$n2,' = </td><td> ____ </td><td></td>';
        if (($_GET['questions']-$noQ)%2==1) echo '</tr>';
        $noQ--;
    }
    if ($_GET['questions']%2==1) echo '<td></td><td></td></td><td></tr>';
    ?>
    </table><br>
    <span id="butttons">
        <button id="print" onclick="window.print()">Print</button>&nbsp;
        <button id="regen" onclick="location.reload(true)">Regenerate questions</button>
    </span>
    <?php
}
?>
<?php include('../views/footer.html');?>