<?php
require_once "connect.php";
include "login_index.php"
?>
<!-- 
<form class='form_style' action="show_recommendations.php" method="get">
<div class='form_field_wrapper'>User name : <input type="text" name="username"></div><br>
<input type="submit">
</form>
 -->

<?php

$sql = "SELECT cid FROM has_mastered where username='".$_SESSION['username']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$sql2 = "SELECT sid FROM has_chords where cid='".$row['cid']."'";
		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()) {
			$sql3 = "INSERT INTO gets_recommendations (username, cid, sid) VALUES ('".$_SESSION['username']."','".$row['cid']."','".$row2['sid']. "')";
			$result3 = $conn->query($sql3);
			
		} 
    }
    
	$sql4 = "SELECT DISTINCT s.name as name FROM gets_recommendations as gr, songs as s where gr.sid=s.sid and gr.username='".$_SESSION['username']."'";
	$result4 = $conn->query($sql4);
	 while($row4 = $result4->fetch_assoc()) {
	 	 echo "Songs: " . $row4["name"]. "<br>";	
	}
   
    
} else {
    echo "Add chords that you've mastered";
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
