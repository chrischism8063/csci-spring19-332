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
            if(isset($_POST['submit'])){
                $rate = $_POST['rate'];
                echo "<p>Rate is:" .$rate ."</p>";
                $amount = $_POST['amount'];
                echo "Amount is: " .$amount ."</p>";
            }else{
                echo "Amount: <input type='text' name='amount' id='amount'>";
                echo "Tax rate: <input type='text' name='rate' id='rate'>";
                echo "<input type='button' value='submit' name='submit'>";        }
        ?>
    </form>
</body>
</html>