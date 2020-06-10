<?php
	include 'header.php';
?>
<style>
	.container {
		text-align: left;
	}

	input {
		width: 30%;
		font-size: 1.3rem;
		padding: 0.5rem;
		color: #757575;
		border: 1px solid #CED4DA;
		border-radius: 5px;
	}

	label {
		font-weight: bold;
	}

	button {
		border: none;
	}

	@media screen and (max-width: 780px) {
		input {
			width: 100%;
		}

		.btn {
          font-size: 15px;
          padding: 1rem;
          padding-right: 2rem;
          padding-left: 2rem;
          display: inline-block;
        }
	}
</style>
<section id="profile" class="section bg-light space">
	<div class="container">
		<h3>Account Details</h3>
		<hr>
		<form method="post" action="includes/update.php" enctype="multipart/form-data">
			<label>First name:</label><br>
			<?php echo "<input type='text' name='firstName' value='$firstName'><br><br>"; ?>
			<label>Last name:</label><br>
			<?php echo "<input type='text' name='lastName' value='$lastName'><br><br>"; ?>
			<label>Username:</label><br>
			<?php echo "<input type='text' name='email' value='$email' disabled><br><br>"; ?>
			<br><br>

			<h3>Profile Picture</h3>
			<hr>
			<?php echo "<img src='profile-pictures/$picture' id='img' style='width: 15rem; height: 15rem; border-radius: 30rem;'>"; ?>
			
			<br>
			<input type="file" name="picture" onchange="preview(event)">

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
			<h3>Change Password</h3>
			<hr>
			<label>Current password:</label><br>
			<input type="Password" name="currentPassword"><br><br>
			<label>New password:</label><br>
			<input type="Password" name="newPassword"><br><br>
			<label>Re-type new password:</label><br>
			<input type="Password" name="reNewPassword"><br>
			<a href="forgot.php" style="color: blue; font-style: italic;">Forgot Password?</a><br><br>
			<button type="submit"  class="btn btn-secondary" name="submit">Save changes</button>
			<button type="submit" class="btn btn-primary" name="delete">Delete account</button>
		</form>
	</div>
</section>
<?php include  'footer.php'; ?>