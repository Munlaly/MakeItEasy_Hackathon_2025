<?php
$username=$_POST["nev"];
$conn = new mysqli("localhost", "root", "", "images");

if (isset($_POST['submit'])) {
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           

            $sql = "INSERT INTO images (image_path,Name) VALUES ('$target_file','Dani')";
            $conn->query($sql);
               
        } 
    }
    echo "<script>

    window.location.href = 'MainPage.php';
    
    </script>";

$conn->close();
?>
