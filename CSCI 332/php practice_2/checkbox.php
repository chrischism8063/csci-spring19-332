<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkbox</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <?php
        // var_dump($_POST);
        if(isset($_POST['submit'])){
            echo "Your favorite fruites are: ";
            $a = $_POST['fruit'];
            foreach($a as $element){
                switch($element){
                    case "0":
                        echo "Apple ";
                        break;
                    case "1":
                        echo "Orange";
                        break;
                    case "2":
                        echo "Kiwi";
                        break;
                    case "3":
                        echo "Mango";
                        break;
                }
            }
            
        }else{
            echo" <h1>Pick your favorite fruits</h1>";
            echo "<input type='checkbox' name='fruit[]' value='0'>Apple<br />";
            echo "<input type='checkbox' name='fruit[]' value='1'>Orange<br />";
            echo "<input type='checkbox' name='fruit[]' value='2'>Kiwi<br />";
            echo "<input type='checkbox' name='fruit[]' value='3'>Mango<br />";
            echo "<input type='submit' name='submit' value='Submit'>";
        }
    ?>
    </form>
</body>
</html>