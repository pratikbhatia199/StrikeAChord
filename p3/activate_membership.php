<?php
require_once "connect.php";
include "links.php"
?>
<html>
<body>

Activated membership for: <?php echo $_GET["username"]; ?><br>

<?php
$sql = "INSERT INTO member (username, expiry_date) VALUES ('".$_GET["username"]."','". date("Y-m-d")."')";
$result = $conn->query($sql);

?>



<?php
$conn->close();
?>

</body>
</html>
