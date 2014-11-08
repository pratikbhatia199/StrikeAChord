<?php
require_once "connect.php";
include "links.php"
?>


<form action="add_chords_script.php" method="get">
Add a Chord to your list: <br>
Username: <input type="text" name="username"><br>
Chord: <input type="text" name="chord"><br>
<input type="submit">
</form>



<?php

$sql = "SELECT username FROM member";
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
