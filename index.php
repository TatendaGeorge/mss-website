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
<div id="showcase">
	<?php include 'header.php'; ?>
	<div class="section-main container">
		<h1>Methodist Students' Society</h1>
		<h2>Grahamstown Synod</h2>
		<div class="space"></div>
		<a href="donate.php" class="text-secondary btn btn-primary">Donate Learning Material</a>
	</div>	
</div>
<!-- Albums -->
<section id="albums" class="section bg-light">
	<div class="container">
		<h3>Recent Textbooks</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			
		<style>
			
		</style>
					
			<?php 
				$sql = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Textbook' ORDER BY MaterialID DESC LIMIT 4";
				$result = mysqli_query($db,$sql);

				if ($result == false) {
					# code...
				}
				else {
					while ($row = mysqli_fetch_array($result)) {
						$materialID = $row['MaterialID'];
						$title = $row['Title'];
						$type = $row['Type'];
						$file = $row['MaterialFile'];
						$picture = $row['CoverImage'];
						$category = $row['Genre'];
						$date = $row['PostDate'];
						$postUserid = $row['UserID'];

						$sql = "SELECT * FROM users WHERE UserID = '$postUserid' AND Status = 'Active'";
						$result2 = mysqli_query($db,$sql);

						if ($result2 == false) {
							# code...
						}
						else {
							$resultSet = mysqli_fetch_array($result2);

							if (empty($resultSet)) {
								if (isset($_SESSION['login'])) {
									$userName = 'Unknown';
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID'><img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID' style='color: #333;'><h2>$title</h2></a>
									<h4>Category: $category</h4>
									<h4>Date: $date</h4>
									<h4>Posted by: $userName</h4>
									<a href='view.php?m=$materialID' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID'><img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID' style='color: #333;'><h2>$title</h2></a>
									<h4>Category: $category</h4>
									<h4>Date: $date</h4>
									<h4>Posted by: $userName</h4>
									<a href='view.php?m=$materialID' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							else{
								$userName = $resultSet['FirstName'].' '.$resultSet['LastName'];

								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID'><img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID' style='color: #333;'><h2>$title</h2></a>
									<h4>Category: $category</h4>
									<h4>Date: $date</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid' style='color: #d3071b;'>$userName</a></h4>
									<a href='view.php?m=$materialID' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID'><img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID' style='color: #333;'><h2>$title</h2></a>
									<h4>Category: $category</h4>
									<h4>Date: $date</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid' style='color: #d3071b;'>$userName</a></h4>
									<a href='view.php?m=$materialID' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							
						}
					}	
				}
			?>
		</div>
		<br>
		<br>
		<a href="textbooks.php" class="btn btn-primary">View All Textbooks</a>
	</div>
</section>
<!-- Single -->
<section id="singles" class="section">
	<div class="container">
		<h3>Recent Question Papers</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			<?php 
				$sql1 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Question paper' ORDER BY MaterialID DESC LIMIT 4";
				$result1 = mysqli_query($db,$sql1);

				if ($result1 == false) {
					# code...
				}
				else {
					while ($row1 = mysqli_fetch_array($result1)) {
						$materialID1 = $row1['MaterialID'];
						$title1 = $row1['Title'];
						$type1 = $row1['Type'];
						$file1 = $row1['MaterialFile'];
						$picture1 = $row1['CoverImage'];
						$category1 = $row1['Genre'];
						$date1 = $row1['PostDate'];
						$postUserid1 = $row1['UserID'];

						$sql3 = "SELECT * FROM users WHERE UserID = '$postUserid1' AND Status = 'Active'";
						$result3 = mysqli_query($db,$sql3);

						if ($result3 == false) {
							# code...
						}
						else {
							$resultSet3 = mysqli_fetch_array($result3);

							if (empty($resultSet3)) {
								$userName3 = 'Unknown';
								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID1'><h2>$title1</h2></a>
									<h4>Category: $category1</h4>
									<h4>Date: $date1</h4>
									<h4>Posted by: $userName3</h4>
									<a href='view.php?m=$materialID1' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID1'><h2>$title1</h2></a>
									<h4>Category: $category1</h4>
									<h4>Date: $date1</h4>
									<h4>Posted by: $userName3</h4>
									<a href='view.php?m=$materialID1' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							else {
								$userName3 = $resultSet3['FirstName'].' '.$resultSet3['LastName'];

								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID1'><h2>$title1</h2></a>
									<h4>Category: $category1</h4>
									<h4>Date: $date1</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid1' style='color: #d3071b;'>$userName3</a></h4>
									<a href='view.php?m=$materialID1' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID1'><h2>$title1</h2></a>
									<h4>Category: $category1</h4>
									<h4>Date: $date1</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid1' style='color: #d3071b;'>$userName3</a></h4>
									<a href='view.php?m=$materialID1' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							
						}
					}	
				}
			?>
		</div>
		<br>
		<br>
		<a href="papers.php" class="btn btn-primary">View All Papers</a>
	</div>
</section>
<!-- Albums -->
<section id="albums" class="section bg-light">
	<div class="container">
		<h3>Recent Articles</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">		
			<?php 
				$sql4 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Article' ORDER BY MaterialID DESC LIMIT 4";
				$result4 = mysqli_query($db,$sql4);

				if ($result4 == false) {
					# code...
				}
				else {
					while ($row4 = mysqli_fetch_array($result4)) {
						$materialID4 = $row4['MaterialID'];
						$title4 = $row4['Title'];
						$type4 = $row4['Type'];
						$file4 = $row4['MaterialFile'];
						$picture4 = $row4['CoverImage'];
						$category4 = $row4['Genre'];
						$date4 = $row4['PostDate'];
						$postUserid4 = $row4['UserID'];

						$sql6 = "SELECT * FROM users WHERE UserID = '$postUserid4' AND Status = 'Active'";
						$result6 = mysqli_query($db,$sql6);

						if ($result6 == false) {
							# code...
						}
						else {
							$resultSet6 = mysqli_fetch_array($result6);

							if (empty($resultSet6)) {
								$userName6 = 'Unknown';
								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID4'><img style='background: url(material-covers/$picture4) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID4' style='color: #333;'><h2>$title4</h2></a>
									<h4>Category: $category4</h4>
									<h4>Date: $date4</h4>
									<h4>Posted by: $userName6</h4>
									<a href='view.php?m=$materialID4' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID4'><img style='background: url(material-covers/$picture4) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID4' style='color: #333;'><h2>$title4</h2></a>
									<h4>Category: $category4</h4>
									<h4>Date: $date4</h4>
									<h4>Posted by: $userName6</h4>
									<a href='view.php?m=$materialID4' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							else {
								$userName6 = $resultSet6['FirstName'].' '.$resultSet6['LastName'];
								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID4'><img style='background: url(material-covers/$picture4) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID4' style='color: #333;'><h2>$title4</h2></a>
									<h4>Category: $category4</h4>
									<h4>Date: $date4</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid4' style='color: #d3071b;'>$userName6</a></h4>
									<a href='view.php?m=$materialID4' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID4'><img style='background: url(material-covers/$picture4) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID4' style='color: #333;'><h2>$title4</h2></a>
									<h4>Category: $category4</h4>
									<h4>Date: $date4</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid4' style='color: #d3071b;'>$userName6</a></h4>
									<a href='view.php?m=$materialID4' class='text-secondary btn btn-secondary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							
						}
					}	
				}
			?>
		</div>
		<br>
		<br>
		<a href="articles.php" class="btn btn-primary">View All Articles</a>
	</div>
</section>
<!-- Single -->
<section id="singles" class="section">
	<div class="container">
		<h3>Recent Notes</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			<?php 
				$sql5 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Notes' ORDER BY MaterialID DESC LIMIT 4";
				$result5 = mysqli_query($db,$sql5);

				if ($result5 == false) {
					# code...
				}
				else {
					while ($row5 = mysqli_fetch_array($result5)) {
						$materialID5 = $row5['MaterialID'];
						$title5 = $row5['Title'];
						$type5 = $row5['Type'];
						$file5 = $row5['MaterialFile'];
						$picture5 = $row5['CoverImage'];
						$category5 = $row5['Genre'];
						$date5 = $row5['PostDate'];
						$postUserid5 = $row5['UserID'];

						$sql7 = "SELECT * FROM users WHERE UserID = '$postUserid5' AND Status = 'Active'";
						$result7 = mysqli_query($db,$sql7);

						if ($result5 == false) {
							# code...
						}
						else {
							$resultSet7 = mysqli_fetch_array($result7);

							if (empty($resultSet7)) {
								$userName7 = 'Unknown';
								
								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID5'><img style='background: url(material-covers/$picture5) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID5'><h2>$title5</h2></a>
									<h4>Category: $category5</h4>
									<h4>Date: $date5</h4>
									<h4>Posted by: $userName7</h4>
									<a href='view.php?m=$materialID5' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID5'><img style='background: url(material-covers/$picture5) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID5'><h2>$title5</h2></a>
									<h4>Category: $category5</h4>
									<h4>Date: $date5</h4>
									<h4>Posted by: $userName7</h4>
									<a href='view.php?m=$materialID5' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							else {
								$userName7 = $resultSet7['FirstName'].' '.$resultSet7['LastName'];
								if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID5'><img style='background: url(material-covers/$picture5) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID5'><h2>$title5</h2></a>
									<h4>Category: $category5</h4>
									<h4>Date: $date5</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid5' style='color: #d3071b;'>$userName7</a></h4>
									<a href='view.php?m=$materialID5' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
						else {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID5'><img style='background: url(material-covers/$picture5) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID5'><h2>$title5</h2></a>
									<h4>Category: $category5</h4>
									<h4>Date: $date5</h4>
									<h4>Posted by: <a href='profile.php?u=$postUserid5' style='color: #d3071b;'>$userName7</a></h4>
									<a href='view.php?m=$materialID5' class='text-secondary btn btn-primary'>
										 See more
									</a>
									<hr>
								</center>
							</div>";
						}
							}
							
						}
					}	
				}
			?>
		</div>
		<br>
		<br>
		<a href="notes.php" class="btn btn-primary">View All Notes</a>
	</div>
</section>
<style>
	.text {
		text-align: left;
	}
</style>
<!-- About -->
<section id="about" class="section bg-light">
	<div class="container">
		<h2 class="section-head">About Us</h2>
		<h3>MethSSoc Grahamstown Synod 0200</h3>
		<img src="img/IMG-20200429-WA0001.jpg" style="width: 15rem; height: 15rem; border-radius: 30rem;">
		<p>This is a society of students who are Methodists and adherents, who have come together to fellowship within institutions of higher learning, our synod is currently made out of three branches Nelson Mandela University, Rhodes University, and the University of Forte Hare.</p>
		<div class="text">
			<h3>Our Vision</h3>
		<p>A christ healed, transformed and empowered community.</p>

		<h3>Our Mission</h3>
		<p>We exist to proclaim the holistic gospel of Jesus Christ, and to unite and empower student communities at tertiary level through engaging in:
			<ul>
				<li>Spiritual growth</li>
				<li>Enhancing, trainning and teaching through academic support.</li>
				<li>Social Injusties issues.</li>
				<li>Leadership and Development. Community Development</li>
				<li>Economic empowerment</li>
			</ul>
		</p>

		<h3>Aims and objectives</h3>
		<p>
			<ul>
				<li>To aweken and deepen the christian life in young people.</li>
				<li>To proclaim and promote christian life through prayer, worship, and preaching.</li>
				<li>To participate and promote a ministry of reconciliation in our synod and in South Africa.</li>
				<li>To participate in rendering social services in our communities.</li>
				<li>To equip young people with life skiils through mentorship and leadership workshops.</li>
			</ul>
		</p>

		<h3>Values</h3>
			<ul>
				<li>Servant hood.</li>
				<li>Love and care.</li>
				<li>Commitment and dedication.</li>
				<li>Accountability and transparency.</li>
			</ul>
		</p>
	</div>
</div>
</section>
<style>
	input {
		width: 50%;
		font-size: 1.3rem;
		padding: 0.5rem;
		color: #fff;
		border: 1px solid #CED4DA;
		border-radius: 5px;
		background: transparent;
	}

	textarea {
		width: 50%;
		height: 10rem;
		padding: 0.5rem;
		color: #fff;
		border: 1px solid #CED4DA;
		border-radius: 5px;
		font-size: 1.5rem;
		background: transparent;
	}
	label {
		margin-left: -40%;
		font-weight: bold;
	}

	button {
		border: none;
	}

	#contact {
	  margin: 0;
	  padding: 0;
	  background: url('img/banner5.jpeg') no-repeat center/cover fixed;
	  width: 100%;
	  height: 100vh;
	  overflow-y: hidden;
	}

	#contact .container {
		margin-top: 10vh;
	}

	#contact h1 {
	  font-size: 4rem;
	  margin-bottom: 0;
	}

	@media screen and (max-width: 780px) {
		#showcase h1 {
			font-size: 25px;
		}

		.btn {
          font-size: 15px;
          padding: 1rem;
          padding-right: 2rem;
          padding-left: 2rem;
          display: inline-block;
        }

        .space {
		  padding-top: 10px;
		}
	}
</style>
<div id="contact" class="">
	<div class="section-main container">
		<h1>Contact us</h1>
		<form method="post" action="includes/contact.php">
			<label>Full name</label><br>
			<input type="text" name="name"><br>
			<label>Email</label><br>
			<input type="text" name="email" placeholder="example@mail.com"><br>
			<label>Phone number</label><br>
			<input type="text" name="number"><br><br>
			<textarea name="message"></textarea><br><br>
			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>	
</div>
<!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>