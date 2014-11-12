<?php
require_once "connect.php";
include "login_index.php"
?>

Searching recommendations for username: <?php echo $_GET["username"]; ?><br>
<?php

$sql = "select name from songs where sid IN(select sid from has_chords where cid IN(select cid from has_mastered where username='" . $_GET["username"] ."'))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Found:"."<br>";
    while($row = $result->fetch_assoc()) {
        echo $row["name"] . "<br>";
    }	
    
} else {
    //have to give specialised results here: if not a member, tell to become one, if member but not mastered any chords, need to master some chords
    echo "Activate membership or master some chords";
}
?>

<?php
$conn->close();
?>
