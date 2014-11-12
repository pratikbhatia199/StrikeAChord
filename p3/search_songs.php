<?php
require_once "connect.php";
include "login_index.php"
?>


Searching for song: <?php echo $_GET["name"]; ?><br>

<?php
$sql = "SELECT songs.name as sname, perform.name as pname, songs.sid as sid FROM songs, perform WHERE perform.sid=songs.sid and songs.name LIKE '%" . $_GET["name"] ."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Found: " . $row["sname"].', '.$row['pname'];
        	$sql2 = "SELECT chords.cname as cname from has_chords, chords WHERE chords.cid=has_chords.cid and has_chords.sid='". $row["sid"]."'";
			$result2 = $conn->query($sql2);
			echo ': ';
        	while($row2 = $result2->fetch_assoc()) {
        		echo $row2['cname'].',';
        	}
        echo "<br>";
    }
} else {
    echo "0 results";
}
?>


<?php
$conn->close();
?>

