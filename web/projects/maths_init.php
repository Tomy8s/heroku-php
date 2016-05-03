<?php include('../views/header.php');?>
    <form action="maths.php" method="get" onsubmit="return check()">
        <p>
        Operators:<br>
            <input type="checkbox" name="+" id="+" onclick="flipGrey()">+<br>
            <input type="checkbox" name="-" id="-">-<br>
            <input type="checkbox" name="x" id="x" onclick="flipGrey()">x<br>
            <!--<input type="checkbox" name="÷" id="÷">÷<br>-->
        </p>
        <p>
            <h4>First number</h4>
            Minimum: <input type="number" name="min1" id="mi1" value="0">
            Maximum: <input type="number" name="max1" id="ma1" value="10">
            Multiple of: <input type="number" name="mlt1" id="ml1" value="1">
        </p>
        <p>
            <h4>Second number</h4>
            Minimum: <input type="number" name="min2" id="mi2" value="0">
            Maximum: <input type="number" name="max2" id="ma2" value="10">
            Multiple of: <input type="number" name="mlt2" id="ml2" value="1">
        </p>
        <p>
            <h4>Answer</h4>
            Minimum: <input type="number" name="minA" id="miA" value="0">
            Maximum: <input type="number" name="maxA" id="maA" value="10">
            <!--Multiple of: <input type="number" name="mltA" id="mlA" value="1">-->
        </p>
        <p>
            Number of questions: <input type="number" name="questions" id="noQ" value="20" min="1"><br>
            Number questions: <input type="checkbox" name="qNo" id="qNo"><br>
            Flip values : <input type="checkbox" name="flip" id="flip" onclick="return flipCheck()" disabled> (only works for '+' and 'x')
        </p>
        <input type="submit">
    </form>
    <script src="maths.js"></script> 
<?php include('../views/footer.html');?>