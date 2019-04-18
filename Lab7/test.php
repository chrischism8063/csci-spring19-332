<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TESTING PHP DATABASE</title>
</head>
<body>
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "1q@W_#E4r";
        $conn = new mysqli(servername, username, password);

        if(!$conn){
            die("Connection failed:" .$conn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT exists CSCI332";
        if($conn->query($sql) == TRUE){
            echo "Database created successfully!";
        }else{
            echo "Error creating database:" .$conn->error;
        }

        $sql = "CREATE TABLE student(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            test1 INT,
            test2 INT, 
            final INT, 
            grade FLOAT(10,2)
            )";
        if($con->query($sql) == TRUE){
            echo "Table created successfully!";
        }else{
            echo "Error creating database:" .$conn->error;
        }

        $sql = "INSERT INTO student (firstname, lastname, test1, test2, fianl) VALUES ('" .$_POST['last'] ."','" . $_POST['test1']."','" .$_POST['test2']."','" .$_POST['final']."')";
        echo $sql;
        if($con->query($sql) == TRUE){
            echo "Record created successfully!";
        }else{
            echo "Error creating record:" .$conn->error;
        }
        $conn->close();
    
    ?>
    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
        First Name: <input type="text" name="first"><br />
        LAST Name: <input type="text" name="last"><br />
        Test1: <input type="text" name="test1"><br />
        Test2:  <input type="text" name="test2"><br />
        Final:  <input type="text" name="final"><br />
        <input type="submit" name='submit' value="Submit">
    </form>
</body>
</html>