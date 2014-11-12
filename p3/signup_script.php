<?php
require_once "connect.php";
include "index.php"
?>

Data: <?php 
session_unset();
session_destroy();
session_start();
$_SESSION['username'] = $_GET["username"];

echo $_GET["username"]; 
echo $_GET["firstname"];
echo $_GET["lastname"]; 
echo $_GET["type"];
?><br>

<?php
if ($_GET["type"] == "basic" or $_GET["type"] == "Basic"){

	$sql = "INSERT INTO basic_user (username, firstname, lastname) VALUES ('".$_GET["username"]."','".$_GET["firstname"]."','".$_GET["lastname"]. "')";
	$result = $conn->query($sql);
	header('Location: login_index.php');
	exit;

}
elseif ($_GET["type"] == "member" or $_GET["type"] == "Member"){

	
	$sql = "INSERT INTO basic_user (username, firstname, lastname) VALUES ('".$_GET["username"]."','".$_GET["firstname"]."','".$_GET["lastname"]. "')";
	$result = $conn->query($sql);
	
	$sql = "INSERT INTO member (username, expiry_date) VALUES ('".$_GET["username"]."','". date("Y-m-d")."')";
	$result = $conn->query($sql);
	header('Location: login_index.php');
	exit;
	

}
else echo "Error in form, please correct."


?>



<?php
$conn->close();
?>

