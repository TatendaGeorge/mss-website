<?php include 'header.php'; ?>
<!-- Albums -->
<section id="albums" class="section bg-light">
	<div class="container">
		<h3>Articles</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">		
			<?php 
				$sql4 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Article' ORDER BY MaterialID DESC";
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

						$sql6 = "SELECT * FROM users WHERE UserID = '$postUserid4'";
						$result6 = mysqli_query($db,$sql6);

						if ($result6 == false) {
							# code...
						}
						else {
							$resultSet6 = mysqli_fetch_array($result6);

							$userName6 = $resultSet6['FirstName'].' '.$resultSet6['LastName'];
						}
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
			?>
		</div>
		<br>
		<br>
	</div>
</section>
<?php include 'footer.php'; ?>