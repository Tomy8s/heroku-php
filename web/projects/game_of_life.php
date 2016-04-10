<!--by T. Yates-->
<?php include('../views/header.html');?>
<?php
$rows = abs(intval($_GET['rows']));
$rowno = 1;
$cols = abs(intval($_GET['columns']));
$colno = 1;
$gen = isset($_POST['gen']) ? $_POST['gen'] : 0;
$gen ++;
if (isset($_GET['live']) && is_numeric($_GET['live'])) {
    $live = abs(intval($_GET['live']));
} else if (isset($_GET['random'])) {
    $live = rand(1, $rows * $cols);
}
//Check grid parameters
if (($rows < 1) || ($cols < 1)) {
    ?>
    <P>Please enter an interger above 0.<br>
    <a href="./game_of_life.html">Re-enter grid parameters.</a></P>
<?php
} else if (isset($_GET['live']) && $live > ($rows * $cols)) {
    ?>
    <P>Please enter a number on live squares between 0 and the total number of cells (<?php $rows * $cols ?>).<br>
    <a href="./game_of_life.html">Re-enter grid parameters.</a></P>
<?php
} else {?>
    <p>Your grid has <?php echo $rows;?> rows and <?php echo $cols;?> columns.</p><p>
    <form action="game_of_life.php?rows=<?php echo $rows;?>&columns=<?php echo $cols;?>" method="post">
    <?php
//Random cell generator
    if ($gen == 1 && isset($_GET['random'])) {
        $randomnos = array_fill(0, $live, NULL);
        for ($i = 0; $i < $live; $i ++) {
            $newrand = rand(1, $cols * $rows);
            while (in_array($newrand, $randomnos)) {
                $newrand = rand(1, $cols * $rows);
            }
            $randomnos[$i] = $newrand;
        }
        while ($rowno <= $rows) {
            $colno = 1;
            while ($colno <= $cols) {
                echo '<input type="checkbox" name="', $rowno, ',', $colno, '"', (in_array(($rowno - 1)*$cols + $colno, $randomnos)) ? ' checked>' : '>';
                $colno ++;
            }
            echo '<br>';
            $rowno ++;
        }
    } else {
        while ($rowno <= $rows) {
            $colno = 1;
            while ($colno <= $cols) {
                echo '<input type="checkbox" name="'.$rowno.','.$colno.'"';
    //Start of live/dead test
                $neicells = array(
                    isset($_POST[($rowno-1).','.($colno-1)]), isset($_POST[($rowno-1).','.($colno)]), isset($_POST[($rowno-1).','.($colno+1)]),
                    isset($_POST[($rowno).','.($colno-1)]), isset($_POST[($rowno).','.($colno+1)]),
                    isset($_POST[($rowno+1).','.($colno-1)]), isset($_POST[($rowno+1).','.($colno)]), isset($_POST[($rowno+1).','.($colno+1)]));
                $neino = 0;
                foreach ($neicells as $nei) {
                    if ($nei == true) {
                        $neino ++;
                    }
                }
                echo ($neino === 3 || isset($_POST[$rowno.','.$colno]) && $neino === 2)  ? ' checked>' : '>';
    //End of live/dead test
                $colno ++;
            }
            echo '<br>';
            $rowno ++;
        }
    }
    ?>
    <p>
        <!--<input type=submit value="Previous generation">-->
        Current generation: <?php echo $gen -1;?>
        <input type="hidden" value="<?php echo $gen;?>" name="gen">
        <input type="submit" value="Next generation" autofocus></form></p></p>
    <?php
}
?>
<?php include('../views/footer.html');?>