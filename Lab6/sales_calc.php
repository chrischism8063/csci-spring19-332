<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Tax Calculator</title>
</head>
<body>
    <h1>Sales Tax Calculator</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <?php
            
            function displayForm($error1, $error2){
                echo "Amount: <input type='text' name='amount' required><br />" .$error2 ."<br />";
                echo "Tax rate: <input type='text' name='rate' required><br />" .$error1 ."<br />";
                echo "<input type='submit' name='submit' value='Submit'>";
            }

            if(isset($_POST['submit'])){
                if(empty($_POST['rate']) || !(is_numeric($_POST['rate']))){
                    $error1 = "Please enter a numeric value for the rate!<br />";
                    displayForm($error1, $error2);
                }
                if(empty($_POST['amount']) || !(is_numeric($_POST['amount']))){ 
                    $error2 = "Please enter a numberic value for the amount!<br />";
                    displayForm($error1, $error2);
                }
                if(empty($error1) && empty($error2)){
                    $rate = $_POST['rate'];
                    $amount = $_POST['amount'];
                    $total = (($rate / 100) * $amount) + $amount;

                    echo "Entered Amount: " .$amount ."<br />";
                    echo "Enerted Tax Rate: " .$rate ."% <br />";
                    echo "Calculated Tax Amount:$" .number_format($total, 2) ."<br />";
                    echo "<input type='submit' name='return' value='Return'>";
                }
            }else if(isset($POST['return'])){
                $rate = 0;
                $amount = 0;
                $total = 0;
                displayForm($error1, $error2);
            }else{
                displayForm($error1, $error2);
            }
        ?>
    </form>
</body>
</html>