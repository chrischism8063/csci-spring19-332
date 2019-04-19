<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>CSU Information System Welcome</title>
</head>
<body>
    <div class="header">
        <h1>CSCI University</h1>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="">New Student</a>
            </li>
            <li>
                <a href="">New Class</a>
            </li>
            <li>
                <a href="">Register for Classes</a>
            </li>
        </ul>
    </div>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "1q@W_#E4r";
        $conn = new mysqli($servername, $username, $password);
        
        if(!$conn){
            die("Connection failed:" .$conn->connect_error ."<br />");
        }else{
            echo "Connection successful!<br />";
        }

        //Create database
        $sql = "CREATE DATABASE IF NOT EXISTS Registrations";

        if($conn->query($sql)){
            echo "Successfully created database!<br />";
            $sql = "use Registrations";
            $conn->query($sql);
        }else{
            echo "Database build failed!<br />";
        }

        //Create tables
        $sql = "CREATE TABLE IF NOT EXISTS Classes
            (SID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            Name VARCHAR(40) NOT NULL
            )";
        if($conn->query($sql)){
            echo "Successfully created Classes Table<br />";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Schedule
            ( CID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(40) NOT NULL )";
        if($conn->query($sql)){
            echo "Successfully created Schedule Table<br />";
        }

        $sql = "CREATE TABLE IF NOT EXISTS Students
            (EID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            SNAME VARCHAR(40) NOT NULL,
            Class1  VARCHAR(40) NOT NULL,
            Class2  VARCHAR(40),
            Class3 VARCHAR(40))";
        if($conn->query($sql)){
            echo "Successfully created Students Table<br />";
        }

    ?>
</body>
</html>