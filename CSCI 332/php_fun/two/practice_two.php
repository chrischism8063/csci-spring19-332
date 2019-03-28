<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            if($_POST['seperator']){
                echo "<hr />";
            }
            if($_POST['textbox']){
                echo "<input type='textbox'><br />";
            }
        }
    ?>
<!--  $_SERVER['PHP_SELF'] TO ALLOW PAGE TO PROCESS INPUT -->
<form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
        <input type="checkbox" name="seperator" id="seperator">Show a seperator<br />
        <input type="checkbox" name="textbox" id="textbox">Show a textbox<br />
        <button type="submit" value="submit">Show Me!</button>
    </form>
</body>
</html>