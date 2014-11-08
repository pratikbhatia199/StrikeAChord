<?php
require_once "connect.php";
include "links.php"
?>
<html>
<body>

Searching for song: <?php echo $_GET["name"]; ?><br>

<?php
$sql = "SELECT songs.name as s_name FROM songs, perform WHERE perform.name='". $_GET["name"] ."' and perform.sid = songs.sid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Found results: <br>";
    while($row = $result->fetch_assoc()) {
        echo $row["s_name"]. "<br>";
    }
} else {
    echo "0 results found";
}
?>


<?php
$conn->close();
?>

</body>
</html>
