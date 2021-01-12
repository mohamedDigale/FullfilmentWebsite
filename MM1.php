<?php

/*Name: Mohamed Mohamed*/

session_start();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "COVID";


$conn=new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>


<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>Mohaka TECH</title>
<body>

<div id="heading"><h1>Mohaka technologies</h1></div>




<form action="" id="form" method="POST" >
<div id="heading2"><h1>Customer Info</h1></div>
        <label for="cusName">Enter the Customer's Name</label><br>
     
        <select class="dropbox" name="cusName" required>
        <option value="" disabled selected>Customer Name</option>
        <option value="NEW">NEW CUSTOMER</option>

        <?php
        // Get all the names of customers
        $sql = "SELECT cusName FROM customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           //put each name in them dropdown menu
            echo "<option value=\"". $row['cusName']. "\">".$row["cusName"]. "</option>";
        }
        }

        ?>

        </select><br>


        <label for="isHardware">Is Hardware included on this purchase order</label><br>
        <select class="dropbox" name="isHardware" required>
        <option value="" disabled selected>YES/NO</option>
        <option value="YES">YES</option>
        <option value="NO">NO</option>

        </select><br>

        <input type="submit" id="submitBut"  name="submit">



</form>





    

<?php


//If user chooses new customer, go to MM2.php
if(isset($_POST['cusName']) && strcmp($_POST['cusName'],'NEW')==0){
    $_SESSION['isHardware']=$_POST['isHardware'];
    
    //this will store whether a customer exists in database or new
    $_SESSION['isNew']=true;
    header('location: MM2.php');
}



$sql = "SELECT cusName,cusID FROM customer";
$result = $conn->query($sql);
//Go through all the cutomer names to find a match
while(isset($_POST['cusName'])&&isset($_POST['isHardware'])&& $row = $result->fetch_assoc()) {
    //If Customer name exists in database go to MM3.php
    if(strcmp($_POST['cusName'],$row['cusName'])==0){
        $_SESSION['cusID']=$row['cusID'];
        $_SESSION['isNew']=false;
     

        //check if purchase includes hardware, if yes go to collect info about hardware
        if(strcmp($_POST['isHardware'],'YES')==0){
            header('location: MM3.php');
        }else{
            header('location: MM4.php');
        }
       
    }
 }


 $conn-> close();


?>




</body>
</html>
