<?php
require_once "connect.php";
include "login_index.php"
?>


Searching for song: <?php echo $_GET["name"]; ?><br>

<?php
$sql = "SELECT songs.name as s_name, perform.name as pname FROM songs, perform WHERE perform.name LIKE '%". $_GET["name"] ."%' and perform.sid = songs.sid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Found results: <br>";
    while($row = $result->fetch_assoc()) {
        echo $row["s_name"]. ', '. $row['pname']."<br>";
    }
} else {
    echo "0 results found";
}
?>


<?php
$conn->close();
?>

