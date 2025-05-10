<?php
$Name=$_POST["Name"];
$password=$_POST["password"];
$email=$_POST["email"];
$conn=new mysqli("localhost","root","","wecantcode");

$insert="INSERT INTO `users`(`Name`, `email`, `password`, `points`) VALUES ('$Name','$email','$password','0')";
$adatok=mysqli_query($conn,$insert);
echo "<script>

window.location.href = 'MainPage.php';

</script>";
if ($result->num_rows > 0) {
   
    echo '<div id="topbox">';
    echo '<h2>Top Users</h2>';
    echo '<ul>';
    while($row = $result->fetch_assoc()) {
        echo '<li>' . $row["username"] . ' - ' . $row["points"] . ' points</li>';
    }

    echo '</ul>';
    echo '</div>';
} else {
    echo "Nincs adat a felhasználókról.";
}

?>