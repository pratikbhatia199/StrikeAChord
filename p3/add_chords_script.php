<?php
require_once "connect.php";
include "links.php"
?>



<?php

$sql = "SELECT username from member where username='".$_GET["username"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "SELECT cname, cid from chords where cname='".$_GET["chord"]."'";
	$result2 = $conn->query($sql);
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		$sql = "INSERT INTO has_mastered (username, cid) VALUES ('".$_GET["username"]."','".$row["cid"]. "')";
		$result3 = $conn->query($sql);
		echo "chord added";
		}
	}
	else{
		echo "That chord does not exist in any songs in our database.";
	}
}
else{
	echo "Member does not exist.";
}

?>

<?php
$conn->close();
?>
