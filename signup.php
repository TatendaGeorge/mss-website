<?php
    include 'includes/connect.php';
	//session_start();
	$error = null;

	if (isset($_POST['submit'])) {
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		if ($_POST['firstName'] == null || $_POST['lastName'] == null || $_POST['email'] == null || $_POST['password'] == null || $_POST['repassword'] == null) {
			header('Location:signup.php?error=emptyfields');
			}
		 	else {
				if ($_POST['password'] !== $_POST['repassword']) {
				header('Location:signup.php?error=passnomatch');
				exit();
		  		}
		  		else {
		  			$query = "SELECT * FROM users WHERE Email = '$email'";
					$resultSet = mysqli_query($db,$query);

					if ($resultSet === false) {
						//die( print( sqlsrv_errors()) );
					}
					else {
						$rows = mysqli_fetch_array($resultSet);
						if (!empty($rows)) {
							header("Location:signup.php?error=alreadyexist");
							//exit();
						}
						else {
							$password = md5($repassword);
		  			$picture = 'profile-avatar.png';
		  			$SignUpDate = DATE("Y-M-D");

		  			$sql = "INSERT INTO Users (FirstName, LastName, Email, Password, SignUpDate, ProfilePicture, Status) VALUES ('$firstName', '$lastName', '$email', '$password', '$SignUpDate', '$picture', 'Active')";
		  			$result = mysqli_query($db,$sql);

		  			if ($result == false){
					
					}
					else {
						$sql = "SELECT * FROM users WHERE Email = '$email' AND Status = 'Active'";
						$result = mysqli_query($db,$sql);

						if ($result === false) {
							//die( print( sqlsrv_errors()) );
						}
						else {
							$row = mysqli_fetch_array($result);
							session_start();
							$_SESSION['login'] = 1;
							$_SESSION['UserID'] = $row['UserID'];
							$_SESSION['email'] = $row['Email'];
							$_SESSION['firstName'] = $row['FirstName'];
							$_SESSION['lastName'] = $row['LastName'];
							$_SESSION['profile-picture'] = $row['ProfilePicture'];
							$_SESSION['signUpDate'] = $row['SignUpDate'];
							
							header("Location: index.php");
							exit();
						}

					}
						}
					}
		  		}
			}		
	}
?>
<?php include 'header.php'; ?>
<style>
	input {
		width: 50%;
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
	label {
		margin-left: -40%;
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
		background: #252529;
	}
	
</style>
<section id="albums" class="section bg-light space">
	<div class="container box space">
		<hr class="line">
		<h3>Sign Up</h3>
		<p class="lead">Please provide your details to signup</p>
		<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error']=="invalid") {
					echo "<p style='color: #b90415;'>Username/Password incorrect.</p>";
				}elseif($_GET['error']=="emptyfields"){
				echo "<p style='color: #b90415;'>Please fill in all spaces.</p>";
				}
				elseif ($_GET['error']=="alreadyexist") {
						echo "<p style='color: #b90415;'>The email entered already exists in our system. Please enter a different email.</p>";
					}
				elseif ($_GET['error']=="passnomatch") {
						echo "<p style='color: #b90415;'>The passwords do not match.</p>";
					}	
			}
		?>
		<div class="left">
			<form method="post" action="">
			<label>First Name:</label>
			<br>
			<input type="text" name="firstName">
			<br>
			<br>
			<label>Last Name:</label>
			<br>
			<input type="text" name="lastName">
			<br>
			<br>
			<label>Email Add.:</label>
			<br>
			<input type="text" name="email">
			<br>
			<br>
			<label>Password:</label>
			<br>
			<input type="password" name="password">
			<br>
			<br>
			<label>Confirm Password:</label>
			<br>
			<input type="password" name="repassword">
			<br>
			<br>
			<button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
			<p>Already have an account? Login <a href="login.php" style="color: blue; text-decoration: underline;">here</a></p>
		</form>
		</div>
	</div>
</section>
<!-- Footer -->
<?php include 'footer.php'; ?>
</body>
</html>