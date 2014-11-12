<?php
require_once "connect.php";

?>

<html>
<head>
  <link href="master_style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>        

  <script src="bootstrap.min.js"></script>
<link type="text/css" href="bootstrap.css" rel="Stylesheet" />
<link type="text/css" href="simple-sidebar.css" rel="Stylesheet" />

<link type="text/css" href="bootstrap-theme.min.css" rel="Stylesheet" />
<title> Strike a Chord</title>
</head>
<body>
	<div class='body_content_wrapper'>

	    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                     <a height=100 href="login_index.php"> 
					<img alt="Brand"  height=50 src="strike_a_chord_logo.png">
					Strike A Chord</a>
                </li>
                <li>
                    Hi, <?php 
                    	if (session_status() != PHP_SESSION_NONE) {
							session_unset();
							session_destroy();
							session_start();
							$_SESSION['username'] = $_GET["username"];
							echo $_SESSION['username']; 

						}
						else{
							session_start();
							echo $_SESSION['username']; 
						}
							
						?>
                </li>
                <li>
                    <a href="songs.php">Search Songs</a>
                </li>
                <li>
                    <a href="chords.php">Search Chords</a>
                </li>
                <li>
                    <a href="artists.php">Search Artists</a>
                </li>
               <?php 
               		$sql = "SELECT username from member where username='".$_SESSION["username"]."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo '<li><a href="recommendations.php">Show Recommendations</a>'.
							'</li><li><a href="add_chords.php">Add Chords</a></li>';
					} 
					else{
						echo '<li><a href="activate_membership.php">Activate Membership</a></li>';
					}
                
                
                ?>
                
                
                <li>
                    <a href="index.php">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
