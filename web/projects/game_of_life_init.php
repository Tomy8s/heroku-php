<?php include('../views/header.php');?>
    <h1>Welcome to the Game of Life</h1>
    <h3>How to play</h3>
    <p>
        Enter the size of the field you'd like to play on. If you'd like a computer to set up the board for you check the "start with randomly placed live cells" checkbox and (optionally) enter the number of live cells you'd like to start with.<br>
        <ul>
            <li>Any live cell with two or three neighbours will survive to the next generation.</li>
            <li>Any dead cell with exactly three neighbours will come to life in the next generation.</li>
            <li>All other cells will be dead in the next generation.</li>
        </ul>
    </p>
    <form action="game_of_life.php" method="get">
        Number of rows: <input type="text" name="rows" autofocus><br>
        Number of columns: <input type="text" name="columns"><br>
        <input type="checkbox" name="random">Start with randomly placed live cells.<br>
        Number of live cells (leave blank for random): <input type="text" name="live"><br>
        <input type="submit" value="Play!">
    </form>
<?php include('../views/footer.html');?>