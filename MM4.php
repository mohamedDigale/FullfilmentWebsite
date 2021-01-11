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
    <label for="appName">Application Name</label><br>
        <select class="dropbox" name="appName" required>
        <option value="" disabled selected>APP Name</option>

        <?php
        // Get all the appName
        $sql = "SELECT appName FROM app";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           //put each appName in them dropdown menu
            echo "<option value=\"". $row['appName']. "\">".$row["appName"]. "</option>";
        }
        }

        ?>
        </select><br>



        <label for="Rel">Enter Application Release</label><br>
        <select class="dropbox" name="Rel" required>
        <option value="" disabled selected>APP Release</option>

        <?php
        // Get all the app Releases
        $sql = "SELECT Rel FROM app";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           //put each in dropdown menu
            echo "<option value=\"". $row['Rel']. "\">".$row["Rel"]. "</option>";
        }
        }

        ?>
        </select><br>


        <label for="purDate">Enter Application purchase date</label><br>
        <input type="date"  name="purDate" class="textbox" ><br>

        
        <label for="EOL">Enter Application Support contract end date</label><br>
        <input type="date"  name="EOL" class="textbox" ><br>


        <input type="submit" id="submitBut"  name="submit">

    </form>


    <?Php

if(isset($_POST['submit'])){



    //GET appID using appName and Rel
        $appName=$_POST['appName'];
        $Rel=$_POST['Rel'];
        $sql = "SELECT appID FROM app where appName='$appName'  and  Rel='$Rel'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $appID=$row['appID'];
        

        $purDate=$_POST['purDate'];
        $EOL=$_POST['EOL'];
        $purDate= !empty($_POST['purDate']) ? "'$purDate'" : "NULL";
        $EOL= !empty($_POST['EOL']) ? "'$EOL'" : "NULL";
        $cusID=$_SESSION['cusID'];

        echo $purDate;
        echo $EOL;
        echo $cusID;

        $sql="insert into cusapp values('$cusID', '$appID', $purDate, $EOL)";
        $conn->query($sql);

        header('location: MM1.php');




}


$conn-> close();

?>



</body>
</html>