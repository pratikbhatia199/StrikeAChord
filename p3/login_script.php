<?php
require_once "connect.php";

?>


<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['username'] = $_GET["username"];
$sql = "SELECT username FROM basic_user WHERE username='" . $_GET["username"] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "Name: " . $row["name"]. "<br>";
//     }	
		include "login_index.php";
//         echo "<span class='status'>Username exists</span>";
        


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
<?php
}
else {
	include "index.php";
    echo "<span class='status'>Username does not exist</span>".'</div></body></html>';
}


?>



<?php

$conn->close();
?>
