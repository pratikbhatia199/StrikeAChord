<?php
require_once "connect.php";
include "links.php"
?>
<html>
<body>
Data: <?php echo $_GET["username"]; 
echo $_GET["firstname"];
echo $_GET["lastname"]; 
echo $_GET["type"];
?><br>

<?php
if ($_GET["type"] == "basic" or $_GET["type"] == "Basic"){

	$sql = "INSERT INTO basic_user (username, firstname, lastname) VALUES ('".$_GET["username"]."','".$_GET["firstname"]."','".$_GET["lastname"]. "')";
	$result = $conn->query($sql);

}
elseif ($_GET["type"] == "member" or $_GET["type"] == "Member"){

	
	$sql = "INSERT INTO basic_user (username, firstname, lastname) VALUES ('".$_GET["username"]."','".$_GET["firstname"]."','".$_GET["lastname"]. "')";
	$result = $conn->query($sql);
	
	$sql = "INSERT INTO member (username, expiry_date) VALUES ('".$_GET["username"]."','". date("Y-m-d")."')";
	$result = $conn->query($sql);

	

}
else echo "Error in form, please correct."


?>



<?php
$conn->close();
?>

</body>
</html>
