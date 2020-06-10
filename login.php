<?php
    include 'includes/connect.php';
	//session_start();
	$error = null;
	$result = null;
?>
<?php include 'header.php'; ?>
<style>

	input {
		width: 100%;
		font-size: 1.3rem;
		padding: 0.5rem;
		color: #757575;
		border: 1px solid #CED4DA;
		border-radius: 5px;
	}
	textarea {
		width: 50%;
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
		<h3>Login</h3>
		<form method="post" action="includes/login.php">
			<?php 
				if (isset($_GET['error'])) {
					if ($_GET['error']=="invalid") {
						echo "<p style='color: #b90415;'>Username/Password incorrect.</p>";
					}elseif($_GET['error']=="emptyfields"){
					echo "<p style='color: #b90415;'>Please fill in all spaces.</p>";
					}
					elseif ($_GET['error']=="notexist") {
							echo "<p style='color: #b90415;'>This username does not exist in our records.</p>";
						}	
				}
			?>
			<div class="left">
				<label class="label">Username:</label>
				<br>
				<input type="text" name="email">
				<br>
				<br>
				<label>Password:</label>
				<br>
				<input type="password" name="password">
				<br>
				<a href="forgot.php" style="color: blue; font-style: italic;">Forgot Password?</a>
				<br>
				<br>
			</div>
			
			
			<button type="submit" class="btn btn-primary" name="submit">Login</button>
			<p>Don't have an account? Signup <a href="signup.php" style="color: blue; text-decoration: underline;">here</a></p>
		</form>
	</div>
</section>
<!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>