<?php include 'header.php'; ?>
<!-- Single -->
<section id="singles" class="section bg-light">
	<div class="container">
		<h3>Notes</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			<?php 
				$sql5 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Notes' ORDER BY MaterialID DESC";
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

						$sql7 = "SELECT * FROM users WHERE UserID = '$postUserid5'";
						$result7 = mysqli_query($db,$sql7);

						if ($result5 == false) {
							# code...
						}
						else {
							$resultSet7 = mysqli_fetch_array($result7);

							$userName7 = $resultSet7['FirstName'].' '.$resultSet7['LastName'];
						}
						if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID5'><img style='background: url(material-covers/$picture5) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID5' style='color: #333;'><h2>$title5</h2></a>
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
									<a href='view.php?m=$materialID5' style='color: #333;'><h2>$title5</h2></a>
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
			?>
		</div>
		<br>
		<br>
	</div>
</section>
<?php include 'footer.php'; ?>