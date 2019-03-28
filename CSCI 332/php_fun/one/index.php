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
        $myGoal = "I will get a F in this class!<br />";
        echo $myGoal;
        echo "I will raise my goal so ";
        echo str_replace("F", "A", $myGoal);
        echo "I will join " . "two strings<br />";
        $x = "this is string 1";
        $y = "this is string 2<br />";
        $z = $x . $y;
        echo $z;
        $item = 5;
        $price = 2;
        echo "You purchsed " . $item . " items<br />";
        echo "Each item costs "  .$price ." dollars<br />";
        echo "Total cost is " . $item * $price . " dollars<br />";


    ?>
</body>
</html>