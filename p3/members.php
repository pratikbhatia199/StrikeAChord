<?php
require_once "connect.php";
include "login_index.php"
?>


<!-- 
<?php

$sql = "SELECT username FROM basic_user where username NOT IN (SELECT username FROM member)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "Username: " . $row["username"]. "<br>";
//     }	
//     
} else {
    echo "0 results";
}
?>
 -->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sql = "INSERT INTO member (username, expiry_date) VALUES ('".$_SESSION['username']."','". date("Y-m-d")."')";
$result = $conn->query($sql);
echo 'Start adding chords so you can get song recommendations.';

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