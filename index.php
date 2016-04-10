<h1><u><b>Welcome</b></u></h1>
Contents of the current directory:
<ul>
<?php
    foreach (scandir('.') as $page) {
        echo "<li><a href=\"$page\">$page</a></li>";
    }
?>
</ul>