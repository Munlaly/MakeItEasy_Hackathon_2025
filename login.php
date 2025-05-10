<?php
$Name=$_POST["Name"];
$password=$_POST["password"];
$conn=new mysqli("localhost","root","","wecantcode");
$passwordInDataBase="SELECT * FROM `users` WHERE Name='$Name'";
$eredmeny=mysqli_query($conn,$passwordInDataBase);


if ($eredmeny->num_rows > 0) {
    $sor = $eredmeny->fetch_assoc();
 
    if ($sor["password"] == $password) {
        
       
        session_start();

    
        $_SESSION['Name'] = $Name;

        
        header("Location: MainPage.php?username=" . urlencode($Name));
} 
        
    exit();
    } else {
       
        echo "sikertelen bejelentkezes";
    }

?>