<?php
require_once "connect.php";
include "index.php"
?>
<form class='form_style' action="signup_script.php" method="get">
<div class='form_field_wrapper'>Username: <input type="text" name="username"></div><br>
<div class='form_field_wrapper'>First Name: <input type="text" name="firstname"></div><br>
<div class='form_field_wrapper'>Last Name: <input type="text" name="lastname"></div><br>
<div class='form_field_wrapper'>Type (basic or member): <input type="text" name="type"></div><br>
<input type="submit">
</form>


<?php
$conn->close();
?>
</div>
</body>
</html>