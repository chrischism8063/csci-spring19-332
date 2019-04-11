<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>>CSCI Online Store</title>
</head>
<body>
<div class="header">
    <h1>CSCI Online Store</h1>
</div>
<?php $a = $_POST['cart'];
    $total = 0;
    echo "<table border='1'>";
    echo "<tr><th>Item</th><th>Price</th></tr>";

    if(isset($_POST['cart'])){
        foreach($a as $x){
            echo "<tr>";
            switch($x){
                case "0":
                    echo "<td>Computer 1</td>";
                    echo "<td>$1299</td>";
                    $total += 1299;
                    break;
                case "1":
                    echo "<td>Computer 2</td>";
                    echo "<td>$1599</td>";
                    $total += 1599;
                    break;
                case "2":
                    echo "<td>Computer 3</td>";
                    echo "<td>$1999</td>";
                    $total += 1999;
                    break;
                case "3":
                    echo "<td>Computer 4</td>";
                    echo "<td>$1899</td>";
                    $total += 1899;
                    break;
                case "4":
                    echo "<td>Computer 5</td>";
                    echo "<td>$1099</td>";
                    $total += 1099;
                    break;
                case "5":
                    echo "<td>Computer 6</td>";
                    echo "<td>$1499</td>";
                    $total += 1499;
                    break;
            }
            echo "</td></tr>";
        }
        echo "<tr><td  colspan='2'>Total: &#09; $" .$total ."</td></tr>";
        echo "</table>";
        echo "<a href='store.html'>Home</a>";
    }
?>

</body>
</html>