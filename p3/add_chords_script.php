<?php
require_once "connect.php";
include "login_index.php"
?>


<form class='form_style' action="add_chords_script.php" method="get">
<div class='form_title'>Add a Chord to your list: </div><br>
<div class='form_field_wrapper'>Chord: <input type="text" name="chord"></div><br>
<input type="submit">
</form>
<?php

$sql = "SELECT username from member where username='".$_SESSION["username"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "SELECT cname, cid from chords where cname='".$_GET["chord"]."'";
	$result2 = $conn->query($sql);
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		$sql = "INSERT INTO has_mastered (username, cid) VALUES ('".$_SESSION["username"]."','".$row["cid"]. "')";
		$result3 = $conn->query($sql);
		echo "Chord added to your list.<br>";
		
		
			$sql4 = "SELECT cname FROM has_mastered as hm, chords as c where c.cid=hm.cid and username='".$_SESSION['username']."'";
			$result4 = $conn->query($sql4);
				// output data of each row
				while($row4 = $result4->fetch_assoc()) {
					echo "Chords: " . $row4["cname"]. "<br>";
				}	
	
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
