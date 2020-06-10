<?php include 'header.php'; ?>
<!-- Single -->
<section id="singles" class="section bg-light">
	<div class="container">
		<h3>Question Papers</h3>
		<p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br>
		<div class="albums">
			<?php 
				$sql1 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND Type = 'Question paper' ORDER BY MaterialID DESC";
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

						$sql3 = "SELECT * FROM users WHERE UserID = '$postUserid1'";
						$result3 = mysqli_query($db,$sql3);

						if ($result3 == false) {
							# code...
						}
						else {
							$resultSet3 = mysqli_fetch_array($result3);

							$userName3 = $resultSet3['FirstName'].' '.$resultSet3['LastName'];
						}
						if (isset($_SESSION['login'])) {
							echo "<div>
								<center>
									<div class='cover'>
										<a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
									</div>
									<a href='view.php?m=$materialID1' style='color: #333;'><h2>$title1</h2></a>
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
									<a href='view.php?m=$materialID1' style='color: #333;'><h2>$title1</h2></a>
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
			?>
		</div>
		<br>
		<br>
	</div>
</section>
<?php include 'footer.php'; ?>