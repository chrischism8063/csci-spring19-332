<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            if(empty($_POST["username"])){
                $error1 = "Please enter your name! <br />";
            }
            if(empty($_POST["email"])){
                $error2="ERROR! Please enter your email!<br />";
            }
            if(!empty($error1)){
                echo $error1;
            }
            if(!empty($error2)){
                echo $error2;
            }
            if(empty($error1) && empty($error2)){
                echo "Welcome " . $_POST["username"] . "!<br />";
                echo "Your email address is " . $_POST["email"] . "<br />";
            }
        }
    ?>

    <form action="process.php" method="POST">
        Name: <input type="text" name="username" id="username">
        Email: <input type="email" name="email" id="email">
        <input type="submit" value="Send to server" name ="submit">
    </form>

</body>
</html>