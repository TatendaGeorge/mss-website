<?php
include 'includes/connect.php';
session_start();
if (isset($_SESSION['login'])) {
	$userid = $_SESSION['UserID'];
	$email = $_SESSION['email'];
	$firstName = $_SESSION['firstName'];
	$lastName = $_SESSION['lastName'];
	$joinDate = $_SESSION['signUpDate'];
	$picture = $_SESSION['profile-picture'];
}
else {
	$userid = 0;
}
?>

<style>
	@media screen and (max-width: 780px) {
		.user {
			float: left;
		}

		.link {
			width: 100%;
		}
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Dlala Lazz Music</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
</head>
<body>
<!-- Showcase & Nav -->
<div id="">
	<header>
		<nav class='cf'>
		  <ul class='cf'>
		  	<li class="hide-on-small">
		  		<a href="index.php" class="logo"><img src="img/IMG-20200427-WA0019.jpg" style="width: 55px; height: 55px; border-radius: 50%; border: 3px solid #fff;"></a>

		  	</li>
			  <li>
		      <?php 
		      if (isset($_SESSION['login'])) {
		      	echo "<a href='profile.php?u=$userid' class='user'><img src='profile-pictures/$picture' style='width: 30px; height: 30px; border-radius: 20px; font-weight: bold;' class='avatar'>&nbsp &nbsp &nbsp &nbsp $firstName</a>";
		      }
		      else{
		      	echo "<a href='login.php' class='user' style='font-weight: bold;'>Login</a>";
		      }
		      ?>
		     <li>
		      <a href='index.php' class="link">Home</a>
		    </li>
		    <li>
		      <a href='textbooks.php' class="link">Text Books</a>
		    </li>
		    <li>
		      <a href='papers.php' class="link">Papers</a>
		    </li>
		    <li>
		      <a href='articles.php' class="link">Articles</a>
		    </li>
		    <li>
		      <a href='notes.php' class="link">Notes</a>
		    </li>
		  </ul>
		  <a href='#' id='openup' class="logo"><img src="img/IMG-20200427-WA0019.jpg" style="width: 30px; height: 30px; border-radius: 20px; border: 1px solid #fff;">&nbsp &nbsp &nbsp &nbsp &nbsp Methodist Students' Society </a>
		</nav>
	</header>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/main.js"></script>