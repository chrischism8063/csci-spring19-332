<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">    
    <title>Registration Menu</title>
</head>
<body>
     <div class="header">
        <h1>CSCI University Registration Page</h1>
        <a href="index.php">Home</a>
    </div>
    
    <div class="main">
        <form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
            Name: <input type="text" name="name" id="name" placeholder="Name Here"><br />
            Pick at most 3 classes:<br />
            <?php
                $conn = new mysqli( "localhost", "root", "1q@W_#E4r", "registrations");

                if(!$conn){
                    die("Connection failed:" .$conn->connect_error ."<br />");
                }else{
                    echo "Connection successful!<br />";
                }
                    
                $sql = "SELECT * FROM classes";
                $result = $conn->query($sql);
                if($result){
                    if($result->num_rows > 0){
                        while($row=$result->fetch_assoc()){
                            echo "<input type='checkbox' name='classes[]' value='" .$row["CID"] ."'>" .$row["Name"] ."<br />";
                        }
                    }
                }else{
                    echo "Insert failed.<br />";
                }
            ?>
            <button type="submit" name="submit">Register!</button>
        </form>
    </div>  
    <!-- create table  -->
    <div class="display_table">
        <!-- show all data in table regardless of any entries-->
        <?php
            // $pre_selected = $_POST['classes'];
            if(isset($_POST['submit']) && (!empty($_POST['classes'])) && (!empty($_POST['name'])) && (count($_POST['classes']) < 4)){
                echo "Submit has been selected<br />";




                $sql = "INSERT INTO schedule (SNAME, Class1, Class2, Class3) VALUES('" .$_POST['name'] ."'";


            $punct = "', '";
            $end = "')";
            $class_selected = $_POST['classes'];
            unset($_POST['classes']);
            for($a = 0; $a < count($class_selected); $a++){
                //Add a class selected
                //get names of each class however man         
                $sql = "SELECT Name Where CID='" .$class_selected[$a] ."'";
                $result = $conn->query($sql);

                //STOPPED HERE
                echo $result['name'];
                if($result){
                    if($result->num_rows > 0){
                     while($row=$result->fetch_assoc()){
                        $sql = $sql.$class_selected[$a];
                        echo $class_selected[$a] ."<br />";
                        //If it isnt the last item, add a comma to it.
                        if($a < count($class_selected)){
                            $sql = $sql.$punct;
                        }
                }else{
                    echo "Insert failed";
                }
                
            }
            $class_selected = array();
            $sql = $sql.$end;

            echo "<br />" .$sql ."<br />";

            //Show table
            if($conn->query($sql)){
                $_message = "<br />---Insertion successful---<br />";

                $sql = "SELECT * FROM schedule";

                $result = $conn->query($sql);
                if($result){
                    if($result->num_rows > 0){
                        echo "<table border='1'>";
                        echo "<tr><th>Enrollment ID</th><th>Student Name</th><th>Class Name</th><th>Class Name</th><th>Class Name</th></tr>";
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row["EID"] ."</td>";
                            echo "<td>" .$row["SNAME"] ."</td>";
                            echo "<td>" .$row["Class1"] ."</td>";
                            echo "<td>" .$row["Class2"] ."</td>";
                            echo "<td>" .$row["Class3"] ."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }else{
                    $_message = "Insert failed.<br />";
                }
            }
        }else{
            // Message code here = "Please enter a valid name and submit!";
            echo "Bad";
        }
        $conn->close();
        ?>
        
    </div>
</body>
</html>