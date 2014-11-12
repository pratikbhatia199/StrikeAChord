<?php
require_once "connect.php";
include "login_index.php"
?>

<p>Enter the chords separated by commas:</p>
<form class='form_style' action="search_chords.php" method="get">
<div class='form_field_wrapper'>Chords: <input type="text" name="name"></div><br>
<input type="submit">
</form>

<?php

$sql = "SELECT name FROM chords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "Name: " . $row["name"]. "<br>";
//     }	
//     
} else {
    echo "0 results";
}
?>

<?php
$conn->close();
?>
                     </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
</div>
</body>
</html>