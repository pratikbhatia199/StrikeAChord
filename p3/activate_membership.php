<?php
require_once "connect.php";
include "login_index.php";
?>


Activated membership for: <?php echo $_SESSION["username"]; ?><br>

<?php
$sql = "INSERT INTO member (username, expiry_date) VALUES ('".$_SESSION['username']."','". date("Y-m-d")."')";
$result = $conn->query($sql);
$conn->close();
header('Location: add_chords.php');
exit;
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