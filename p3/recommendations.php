<?php
require_once "connect.php";
include "links.php"
?>

<form action="show_recommendations.php" method="get">
User name : <input type="text" name="username"><br>
<input type="submit">
</form>

<?php
$sql = "SELECT username FROM has_mastered";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"]. "<br>";
    }	
    
} else {
    echo "0 results";
}
?>

<?php
$conn->close();
?>
