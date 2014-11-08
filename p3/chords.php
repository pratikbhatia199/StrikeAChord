<?php
require_once "connect.php";
include "links.php"
?>

<p>Enter the chords separated by commas:</p>
<form action="search_chords.php" method="get">
Chords: <input type="text" name="name"><br>
<input type="submit">
</form>

<?php

$sql = "SELECT name FROM chords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>";
    }	
    
} else {
    echo "0 results";
}
?>

<?php
$conn->close();
?>
