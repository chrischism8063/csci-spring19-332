<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">    
    <title>Student Menu</title>
</head>
<body>
    <div class="header">
        <h1>CSCI University New Student Page</h1>
    </div>


    <form action="">
        Name: <input type="text" name="name" id="name">
        <button type="submit">Submit</button>
    </form>
    <div>
        <? echo $_message; ?>
    </div>
    <!-- create table  -->
    <div>
        <!-- show all data in table regardless of any entries-->
        <?php
            $conn = new mysqli($_P0ST['server'], $_POST['user'], $_POST['pass']);

            if(!$conn)
                die("Connection failed:" .$conn->connect_error ."<br />");
            else
                echo "Connection successful!<br />";

            $sql = "use Registrations";
            if($conn->query($sql)){
                echo "Successfully accessed the Registrations Database!<br />";
            }else{
                echo "Access Denied!<br />";
            }

                $sql = "SELECT * FROM Students";
                $record = $conn->query($sql);
                echo $record;

        ?>
        
    </div>
</body>
</html>