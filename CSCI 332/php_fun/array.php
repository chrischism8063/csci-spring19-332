<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
        <?php
            if(isset($_POST["submit"])){
                var_dump($_POST);
                echo "this is working";
                $a = array('Apple', 'Orange', 'Banana', 'Pineapple');
                echo "your favorite fruit is:" . $a[$_POST['fruit']];
            }else
            {
                var_dump($_POST);
            }
        ?>
        What is your favorite fruit?<br />
       <input type="radio" name="fruit" value=0>Apple<br />
       <input type="radio" name="fruit" value=1>Orange<br />
       <input type="radio" name="fruit" value=2>Banana<br />
       <input type="radio" name="fruit" value=3>Pineapple<br />
       <button type="submit" value="submit">This is what I like</button>
    </form>
</body>
</html>