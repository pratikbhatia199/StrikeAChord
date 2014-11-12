<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />

  <link href="master_style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>        

  <script src="bootstrap.min.js"></script>
<link type="text/css" href="bootstrap.css" rel="Stylesheet" />
<link type="text/css" href="bootstrap-theme.min.css" rel="Stylesheet" />
<title> Strike a Chord</title>
</head>
<body>
<?php
	if (session_status() != PHP_SESSION_NONE) {
    session_unset();
    session_destroy();
	}
?>
	<div class='body_content_wrapper'>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a height=100 class="navbar-brand my_brand" href="#"> 
			<img alt="Brand"  height=50 src="strike_a_chord_logo.png">

		  </a>
		<a class="navbar-brand brand_font" href="#">Strike A Chord</a>

		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>
	
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
		  <?php
include "links.php"
?>

		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	