<?php
require_once "connect.php";
include "links.php"
?>
<html>
<body>

Searching for song: <?php echo $_GET["name"]; ?><br>

<?php
$sql = "SELECT name FROM songs WHERE name='" . $_GET["name"] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Found: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

<?php

$sql = "select s.name as s_name, c.name as c_name, s.sid, c.cid, perform.name as p_name from songs as s, chords as c, has_chords, perform where s.name='" . $_GET["name"] ."' and has_chords.sid=s.sid and has_chords.cid=c.cid and perform.sid = s.sid";
$result = $conn->query($sql);
$artist = "Unknown";
if ($result->num_rows > 0){
	//just showing the chords of the song
	echo "Chords: ";
	while($row = $result->fetch_assoc()){
		echo $row["c_name"]. ", ";
		$artist = $row["p_name"];
	}
	echo "<br>";
	echo "Artist: ". $artist;
	
} else {
	echo "No chords or artists found";
}

?>

<?php
$conn->close();
?>

</body>
</html>
