<?php
require_once "connect.php";
include "index.php"
?>

<form class='form_style' action="login_script.php" method="get">
<div class='form_field_wrapper'>Username: <input type="text" name="username"></div><br>
<input type="submit">
</form>


<?php
$conn->close();
?>

</div>
</body>
</html>