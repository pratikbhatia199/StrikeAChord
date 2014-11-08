<?php
$dburl =  "cs4111.crryjzz6tp4q.us-west-2.rds.amazonaws.com";
$dbuser = "srk2169";
$dbpassword = "sleepycoltrane47";
$dbname = "strike_a_chord";
$conn = mysqli_connect($dburl, $dbuser, $dbpassword, $dbname);
ini_set('display_errors','On');
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

?>
