<?php

$conn = new mysqli("localhost", "root", "", "wecantcode");


$sql = "SELECT Name, points FROM users";
$result = $conn->query($sql);
$sq2="SELECT Name, points FROM users ORDER BY points DESC";
$result2=$conn->query($sq2);

if ($result2->num_rows > 0) {
    echo '<table id="leaderboard2">';
    echo "<tr><th></th><th>Name</th><th>Points</th></tr>";
    $rank=1;
    while ($row = $result2->fetch_assoc()) {
        echo "<tr><td>" . $rank . "</td><td>" . $row["Name"] . "</td><td>" . $row["points"] . "</td></tr>";
        $rank++;
    }
    echo "</table>";
} else {
    echo "Nincsenek eredmények.";
}

$conn->close();
?>
