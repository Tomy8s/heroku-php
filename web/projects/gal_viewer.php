<?php
    $a = isset($_POST['a'])?$_POST['a']:"";
    $g = isset($_POST['u'])?$_POST['u']:"";
    $s = isset($_POST['s'])?intval($_POST['s']):0;
    $m = isset($_POST['m'])?$_POST['m']:"";
    $n = isset($_POST['n'])?intval($_POST['n']):0;
    $z = isset($_POST['z'])?$_POST['z']:"";
    $i = $s;
    $l = 0;
    ?>
<div style="position:fixed;background:white;margin-top:-8px;padding:8px;z-index:10;width:100%">
    <form method="post" style="display:inline">
        Beggining of address:<input type="text" name="a" value="<?php echo $a; ?>">
        gallery:<input type="text" name="u" value="<?php echo $g; ?>">
        separator:<input type="text" name="m" value="<?php echo $m; ?>">
        first image:<input type="text" name="s" value="<?php echo $s; ?>">
        end of address:<input type="text" name="z" value="<?php echo $z; ?>">
        Number of entries:<input type="text" name="n" value="<?php echo $n; ?>">
        <input type="submit">
    </form>
    <form method="post" style="display:inline">
        <input type="hidden" name="a" value="<?php echo $a; ?>">
        <input type="hidden" name="u" value="<?php echo $g; ?>">
        <input type="hidden" name="m" value="<?php echo $m; ?>">
        <input type="hidden" name="s" value="<?php echo $s - $n; ?>">
        <input type="hidden" name="z" value="<?php echo $z; ?>">
        <input type="hidden" name="n" value="<?php echo $n; ?>">
        <input type="submit" value="previous <?php echo $n; ?>">
    </form>
    <form method="post" style="display:inline">
        <input type="hidden" name="a" value="<?php echo $a; ?>">
        <input type="hidden" name="u" value="<?php echo $g; ?>">
        <input type="hidden" name="m" value="<?php echo $m; ?>">
        <input type="hidden" name="s" value="<?php echo $s + $n; ?>">
        <input type="hidden" name="z" value="<?php echo $z; ?>">
        <input type="hidden" name="n" value="<?php echo $n; ?>">
        <input type="submit" value="next <?php echo $n; ?>">
    </form>
</div>
<div style="margin-top:25px;position:absolute;">
    <?php
    while ($i < $s + $n){
        $url = $a.$g.$m.$i.$z;
        if (strpos(get_headers($url)[0],'200')){
            echo "<div style=\"display:inline-block\"><img src=\"$url\" style=\"margin:5px\"><br>";
            echo $url."</div>";
            $l++;
        }
        $i++;
    }
    if ($l == 0){
        echo "<h3> Sorry, no items matched your search!</h3><p>Check your settings and try again.</p>";
    }
?>
</div>