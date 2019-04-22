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
        <a href="index.php">Home</a>
    </div>
    <div class="main">
        <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
            Name: <input type="text" name="name" id="name" placeholder="Name Here">
            <button type="submit" name="submit">Enroll</button>
        </form>
    </div>  
    <!-- create table  -->
    <div class="display_table">
        <!-- show all data in table regardless of any entries-->
        <?php
            $conn = new mysqli( "localhost", "root", "1q@W_#E4r", "Registrations");

            if(!$conn){
                die($_message  = "Connection failed:" .$conn->connect_error ."<br />");
            }
            if(isset($_POST['submit']) && (!empty($_POST['name']))){
                $sql = "INSERT INTO Students (Name) VALUES ('" .$_POST["name"] . "')";
                if($conn->query($sql)){
                    echo "<br />Record Insert a<br />";
                    $sql = "SELECT * FROM Students";

                    $result = $conn->query($sql);
                    if($result){
                        if($result->num_rows > 0){
                            echo "<table border='1'>";
                            echo "<tr><th>ID</th><th>Name</th></tr>";
                            while($row=$result->fetch_assoc()){
                                echo "<tr><td>".$row["SID"] ."</td>";
                                echo "<td>" .$row["Name"] ."</td></tr>";
                            }
                            echo "</table>";
                        }
                    }else{
                        echo "Insert failed.<br />";
                    }
                }
            }else{
                echo "Please enter a valid name and submit!";
            }
            
            $conn->close();
        ?>
        
    </div>
</body>
</html>