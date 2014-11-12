<?php
require_once "connect.php";
include "login_index.php"
?>


Searching for chords : <br> 
<?php
$chords = explode(",", $_GET["name"]);

foreach ($chords as &$value) {
    $value = trim($value);
    echo $value.",";
}
echo "<br>"

?>

<?php

$sql = "select name, sid from songs where sid in".
" (select sid from has_chords where cid IN(select cid from chords".
" where cname IN('".implode("','",$chords)."')))";

$result = $conn->query($sql);

if ($result->num_rows > 0){
	//just showing the chords of the song
	echo "Found Songs: <br>";
	while($row = $result->fetch_assoc()){
		$sql2 = "SELECT perform.name as pname FROM perform WHERE perform.sid='".$row['sid']."'";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()){
		echo $row["name"] .', '.$row2['pname']. "<br>";
		}
	}

	
} else {
	echo "No songs found with the given chords";
}
?>

<?php
$conn->close();
?>


