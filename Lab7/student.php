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


    <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
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
            $conn = new mysqli( "localhost", "root", "1q@W_#E4r", "Registrations");

            if(!$conn){
                die("Connection failed:" .$conn->connect_error ."<br />");
            }else{
                echo "Connection successful!<br />";
            }

            $sql = "INSERT INTO Students (Name) VALUES ('".$_POST['name']."')";

            if($conn->query($sql)){
                $sql = "SELECT * FROM Students";

                $result = $conn->query($sql);
                while($result->num_rows > 0){
                    echo "id: " .$row["CID"] ."name: " .$row["name"];
               }
            }else{
                echo "Insertion Failure:" .$conn->error();
            }


            if($conn->query($sql)){
                echo "This worked";
                var_dump($record);
            }else{
                echo "Not successful";
            }



            $conn->close();
        ?>
        
    </div>
</body>
</html>