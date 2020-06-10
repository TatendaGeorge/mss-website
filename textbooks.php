<?php include 'header.php'; ?>
<!-- Albums -->
<section id="albums" class="section bg-light">
	<div class="container">
		<h3>Textbooks</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			
		<style>
			.cover {
				width: 18.5rem;
				height: 18.5rem;
				background: black;
			}

			.cover img {
				width: 100%;
				height: 18.5rem;
			}
		</style>
					
			<?php 
				$sql = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Textbook' ORDER BY MaterialID DESC";
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

						$sql = "SELECT * FROM users WHERE UserID = '$postUserid'";
						$result2 = mysqli_query($db,$sql);

						if ($result2 == false) {
							# code...
						}
						else {
							$resultSet = mysqli_fetch_array($result2);

							$userName = $resultSet['FirstName'].' '.$resultSet['LastName'];
						}
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
			?>
		</div>
		<br>
		<br>
	</div>
</section>
<?php include 'footer.php'; ?>