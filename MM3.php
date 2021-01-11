<?php
/*Name: Mohamed Mohamed*/
session_start();


$conn=new mysqli("localhost", "root", "mysql", "COVID");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>



<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Document</title>
<body>


    <div id="heading">
        <h1>COVID technologies</h1>
    </div>
    


       

    <form action="" id="form" method="post">
    <div id="heading2"><h1>Hardware Info</h1></div>
        <label for="manufacturer">Enter Server manufacturer</label><br>
        <select class="dropbox" name="manufacturer" required>
        <option value="" disabled selected>manufacturer</option>

        <?php
        // Get all the manufacturers
        $sql = "SELECT manufacturer FROM hardware";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           //put each manufacturer in them dropdown menu
            echo "<option value=\"". $row['manufacturer']. "\">".$row["manufacturer"]. "</option>";
        }
        }

        ?>
        </select><br>




        <label for="model">Enter Model</label><br>
        <select class="dropbox" name="model" required>
        <option value="" disabled selected>MODEL</option>

        <?php
        // Get all the models
        $sql = "SELECT model FROM hardware";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           //put each model in them dropdown menu
            echo "<option value=\"". $row['model']. "\">".$row["model"]. "</option>";
        }
        }

        ?>
        </select><br>


        <label for="OS">Enter OS of the machine</label><br>
        <input type="text" name="OS" class="textbox" required><br>


        <label for="purDate">Date of Purchase</label><br>
        <input type="date"  name="purDate" class="textbox" ><br>


        <label for="Support">Support contract end date</label><br>
        <input type="date"  name="Support" class="textbox"><br>



        <label for="Web">Enter Web server</label><br>
        <input type="text" name="Web" class="textbox"><br>


        <label for="Java">Enter Java version</label><br>
        <input type="text" name="Java" class="textbox"><br>


        <label for="PHP">Enter PHP version</label><br>
        <input type="text" name="PHP" class="textbox"><br>

        <input type="submit" id="submitBut"  name="submit">




        <?Php

if(isset($_POST['submit'])){



        $man=$_POST['manufacturer'];
        $mod=$_POST['model'];
        $sql = "SELECT machineID FROM hardware where manufacturer='$man'  and  model='$mod'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $machineID=$row['machineID'];
        $cusID=$_SESSION['cusID'];


        if(!$_SESSION['isNew']){
        $sql="SELECT max(sysNo) FROM CUSENV where cusID='$cusID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sysNo=$row['max(sysNo)'];
        $sysNo=$sysNo+1;
        }else{
            $sysNo=1;
        }

       
        $purDate=$_POST['purDate'];
        $Support=$_POST['Support'];
        $purDate= !empty($_POST['purDate']) ? "'$purDate'" : "NULL";
        $Support= !empty($_POST['Support']) ? "'$Support'" : "NULL";
        
        
        $OS=$_POST['OS'];
        $Web=$_POST['Web'];
        $Java=$_POST['Java'];
        $PHP=$_POST['PHP'];
        
        $OS= !empty($_POST['OS']) ? "'$OS'" : "NULL";
        
        $Web= !empty($_POST['Web']) ? "'$Web'" : "NULL";
        $Java= !empty($_POST['Java']) ? "'$Java'" : "NULL";
        $PHP= !empty($_POST['PHP']) ? "'$PHP'" : "NULL";

        

        echo $purDate .  " ".$Support."  ". $OS."   ".$Web."      " .$Java."     ".$PHP;
            
        $sql="insert into CUSENV (cusID, sysNo, machineID, purDate,Support,OS,Web,Java,PHP) values ('$cusID', '$sysNo','$machineID', $purDate,$Support,$OS,$Web,$Java,$PHP)";
        $conn->query($sql);

        header('location: MM4.php');


}
$conn-> close();
        ?>


        
</body>
</html>


