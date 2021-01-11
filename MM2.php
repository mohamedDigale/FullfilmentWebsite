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
    <div id="heading2"><h1>New Customer Info</h1></div>
        <label for="cusName">Customer Name</label><br>
        <input type="text"  name="cusName" class="textbox" required><br>

        <label for="contactName">Contact Name</label><br>
        <input type="text"  name="contactName" class="textbox" required><br>

        <label for="contactNo">Contact number</label><br>
        <input type="text"  name="contactNo" class="textbox" required><br>

        <input type="submit" id="submitBut"  name="submit">

    </form>






    <?php
        


        if(isset($_POST['submit'])){
            $cusName=$_POST['cusName'];
            $contactName=$_POST['contactName'];
            $contactNo=$_POST['contactNo'];

            
            $sql="SELECT MAX(cusID) FROM customer";
            $maxID=$conn->query($sql);
            
    
            $maxID= $maxID->fetch_array();
            $cusID=(int)$maxID[0]+1;
            $_SESSION['cusID']=$cusID;
            

            $sql="insert into customer values('$cusID', '$cusName', '$contactName', '$contactNo')";
            $conn->query($sql);
            

            

            if(strcmp($_SESSION['isHardware'],'YES')==0){

                header('location: MM3.php');
            }else if(strcmp($_SESSION['isHardware'],'NO')==0){
                header('location: MM4.php');
            }

            


        }


        $conn -> close();



    ?>
    





</body>
</html>