<?php
require_once "connect.php";
include "links.php"
?>

<form action="signup_script.php" method="get">
Username: <input type="text" name="username"><br>
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
Type (basic or member): <input type="text" name="type"><br>
<input type="submit">
</form>


<?php
$conn->close();
?>
