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
                $eid = "";
                //check records to see if student name already exists, if so, only update
                $exist_sql = "SELECT EID from schedule WHERE SNAME ='" .$_POST['name'] ."'";

                $exist_result = $conn->query($exist_sql);
                //Checking to see if student is exists
                if($exist_result->num_rows > 0)
                {
                    //Build UPDATE sql
                    while($exist_row=$exist_result->fetch_assoc())
                    {
                        //use $exist_row['EID']  for the actual eid # when updating
                        $eid = $exist_row['EID'];

                        if(count($_POST['classes']) > 0){
                            $main_sql = "UPDATE schedule SET Class1='";
                        }
                    }
                }else{
                    //Build INSERT sql
                    //Create statement based off size of classes ONLY!!!!
                    if(count($_POST['classes']) == 1){
                        $main_sql = "INSERT INTO schedule (SNAME, Class1) VALUES
                        ('" .$_POST['name'] ."','";
                    }else if(count($_POST['classes']) == 2){
                        $main_sql = "INSERT INTO schedule (SNAME, Class1, Class2) VALUES
                        ('" .$_POST['name'] ."','";
                    }else if(count($_POST['classes']) == 3){
                        $main_sql = "INSERT INTO schedule (SNAME, Class1, Class2, Class3) VALUES
                        ('" .$_POST['name'] ."','";
                    }
                }

                $class_selected = $_POST['classes'];

                //Clear classes array
                unset($_POST['classes']);

                //get the names of the classes chosen to insert into database
                for($a = 0; $a < count($class_selected); $a++){
                    //Add a class selected
                    //get names of each class however man    
                    $sql = "SELECT Name from classes Where CID='" .$class_selected[$a] ."'";
                    $result = $conn->query($sql);

                    //Add class name to sql string
                    if($result)
                    {
                        if($result->num_rows > 0)
                        {
                            while($row=$result->fetch_assoc())
                            {
                                $update_sql_one = "', Class2='";
                                $update_sql_two = "', Class3='";
                                $update_end_sql = "' WHERE EID='" .$eid ."'";
                                $punct = "', '";
                                $end = "')";
                                //last edit was removing ' from before parenthesis

                                //INSERT SQL ONLY-->If it isnt the last item, add a comma to it.
                                if($a < count($class_selected)-1 && !($exist_result->num_rows > 0))
                                {
                                    $main_sql = $main_sql .$row['Name'] .$punct;
                                }
                                //if at last item close sql
                                else if(!($exist_result->num_rows > 0))
                                {
                                    $main_sql = $main_sql.$end;
                                }                              

                                //UPDATE SQL ONLY-->Checking the number of rows to build string 
                                if($exist_result->num_rows == 1){
                                    if($a == 0){
                                        $main_sql = $main_sql .$row['Name'] .$update_end_sql;
                                    }
                                }else if($exist_result->num_rows == 2){
                                    if($a == 0){
                                        $main_sql = $main_sql .$row['Name'] .$update_sql_one;
                                    }else if($a == 1){
                                        $main_sql = $main_sql .$row['Name'] .$update_end_sql;
                                    }
                                }else if($exist_result->num_rows == 3){
                                    if($a == 0){
                                        $main_sql = $main_sql .$row['Name'] .$update_sql_one;
                                    }else if($a == 1){
                                        $main_sql = $main_sql .$row['Name'] .$update_sql_two;
                                    }else if($a == 2){
                                        $main_sql = $main_sql .$row['Name'] .$update_end_sql;
                                    }
                                }
                            }
                        }
                    }else{
                        echo "Query failed <br />";
                    }
                }
                $class_selected = array();
                
                //PROBLEM IN THIS QUERY
                $result = $conn->query($main_sql);

                //TL
                //var_dump($main_sql);

                //Show table
                if($result){
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
                        echo "Insert failed: " .$sql ."<br />";
                    }
                }else{
                    echo "Insertion into schedule failed: " .$main_sql ."<br />";
                }
            }
            $conn->close();
        ?>
        
    </div>
</body>
</html>