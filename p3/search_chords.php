<?php
require_once "connect.php";
include "links.php"
?>

<html>
<body>

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

$sql = "select name from songs where sid in".
" (select sid from has_chords where cid IN(select cid from chords".
" where cname IN('".implode("','",$chords)."')))";

$result = $conn->query($sql);

if ($result->num_rows > 0){
	//just showing the chords of the song
	echo "Found Songs: ";
	while($row = $result->fetch_assoc()){
		echo $row["name"] . "<br>";
	}

	
} else {
	echo "No songs found with the given chords";
}
?>

<?php
$conn->close();
?>


