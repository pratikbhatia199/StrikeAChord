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

$sql = "SELECT cname FROM has_mastered as hm, chords as c where c.cid=hm.cid and username='".$_SESSION['username']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Chords: " . $row["cname"]. "<br>";
    }	
    
} else {
    echo 'Start adding chords so you can get song recommendations.';
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