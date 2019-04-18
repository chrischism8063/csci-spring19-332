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
        $servername = 'localhost';
        $username = 'root';
        $password = '1q@W_#E4r';
        
        $conn = new mysqli($servername, $username, $password);
        if(!$conn){
            die("Connection failed: " .$conn->connect_error);
        }else{
            echo "Connection Successful";
        }
        
    ?>
</body>
</html>