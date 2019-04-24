<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Master</title>
</head>
<body>
    <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
        Please select the type of tickets you wish to purchase with desired quantities:<br />
        <input type="checkbox" name="ticket[]" value="0">Child  $4.00 <input type="text" name="child_qty"><br />
        <input type="checkbox" name="ticket[]" value="1">Adult  $6.00 <input type="text" name="adult_qty"><br />
        <button type="submit" name="submit">Purchase</button>
    </form>
    <?php
    //  $total = 0;
        if(isset($_POST['submit']) && !(empty($_POST['ticket'])) && !empty($_POST['child_qty']) || !empty($_POST['adult_qty'])){
            foreach($_POST['ticket'] as $ticket){
                $temp_total = 0;
                if($ticket == 0){
                    //get adult total only
                    $temp_total = $_POST['child_qty'] * 4.00;
                    //add adult cost to total
                    $total += $temp_total;
                }
                if($ticket == 1){
                    //get adult total only
                    $temp_total = $_POST['adult_qty'] * 6.00;
                    $total += $temp_total;
                }
            }
            echo "<br />Total is: $" .number_format((float)$total, 2, '.', ' ') ."<br />";

        }else if(isset($_POST['submit']) && empty($_POST['ticket']) && empty($_POST['child_qty']) || empty($_POST['adult_qty']))
        {
            echo "please enter a select a ticket and enter the correct quantity!";
        }
    ?>
</body>
</html>