<?php
    include 'includes/connect.php';
	//session_start();
	$error = null;
?>
<?php 
	include 'header.php'; 
	if (!isset($_SESSION['login'])) {
		header("Location: login.php");
	}
?>
<style>
	input {
		width: 100%;
		font-size: 1.3rem;
		padding: 0.5rem;
		color: #757575;
		border: 1px solid #CED4DA;
		border-radius: 5px;
	}

	select {
		width: 100%;
		font-size: 1.3rem;
		padding: 0.5rem;
		color: #757575;
		border: 1px solid #CED4DA;
		border-radius: 5px;
	}
	textarea {
		width: 100%;
		height: 10rem;
		padding: 0.5rem;
		color: #757575;
		border: 1px solid #CED4DA;
		border-radius: 5px;
		font-size: 1.5rem;
	}

	.left {
		text-align: left;
		margin-left: 12rem;
		margin-right: 13rem;
		padding: 0;
	}

	label {
		font-weight: bold;
	}

	.box {
		background-color: #fff;
    	max-width: 800px;
    	margin: 10px auto;
    	padding-bottom: 40px;
    	padding-left: 0;
    	padding-right: 0;
    	box-shadow: 6px 6px 6px rgba(0,0,0,0.2);
	}
	
	button {
		border: none;
	}
	.line{
		height: 20px;
		border: none;
		background: var(--primary-color);
	}

	@media screen and (max-width: 780px) {
		.left {
			margin-left: 5rem;
			margin-right: 5rem; 
		}

		.space {
		  padding-top: 10px;
		}
	}
</style>
<section id="albums" class="section bg-light space">
	<div class="container box space">
		<hr class="line">
		<h3>Donate Material</h3>
		<form method="post" action="includes/donate.php" enctype="multipart/form-data">
			<?php 
				if (isset($_GET['error'])) {
					if ($_GET['error']=="invalid") {
						echo "<p style='color: #b90415;'>Username/Password incorrect.</p>";
					}elseif($_GET['error']=="emptyfields"){
					echo "<p style='color: #b90415;'>Please fill in all spaces.</p>";
					}	
				}
			?>
			<div class="left">
				<label class="label">Title:<span style="color: red">*</span></label>
				<br>
				<input type="text" name="title">
				<br>
				<br>
				<label>Material type:<span style="color: red">*</span></label>
				<br>
				<select name="type">
					<option value="Textbook">Textbook</option>
					<option value="Question paper">Question paper</option>
					<option value="Article">Article</option>
					<option value="Notes">Notes</option>
				</select>
				<br>
				<br>
				<label>Category:<span style="color: red">*</span></label>
				<br>
				<select name="genre">
					<option value="Science">Science</option>
					<option value="Law">Law</option>
					<option value="Health Sciences">Health Sciences</option>
					<option value="Built Environment and Technology">Built Environment and Technology</option>
					<option value="Education">Education</option>
					<option value="Business and Economic Sciences">Business and Economic Sciences</option>
					<option value="Humanities">Humanities</option>
				</select>
				<br>
				<br>
				<label>Upload material:<span style="color: red">*</span></label>
				<input type="file" name="material">
				<br>
				<br>
				<label>Cover image:</label>
				<input type="file" name="picture" onchange="preview(event)">
				<br>
				<br>
				<img src="img/custom–1.png" id="img" style="width: 15rem; height: 15rem;">
				<br><br>
				<label>Description:</label>
				<br>
				<textarea name="description"></textarea>
				<br>
				<br>
			</div>
		 	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>
</section>
<!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>
<script>
	function preview(event) {
		var input = event.target.files[0];
		var reader = new FileReader();
		reader.onload = function() {
			var result = reader.result;
			var img = document.getElementById("img");
			img.src = result;
		}
		reader.readAsDataURL(input);
	}
</script>