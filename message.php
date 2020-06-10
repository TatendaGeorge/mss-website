<?php
    include 'includes/connect.php';
	//session_start();
	$error = null;
?>
<?php include 'header.php'; ?>
<style>
	body {
		background: #f4f4f4;
	}
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
    	margin: 5rem auto;
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
</style>
<section id="albums" class="section bg-light space">
	<div class="container box space">
		<hr class="line">
		<h3>Message Sent</h3>
		<h4>Thank you for the message we will get back to you as soon as we can.</h4>
		 <a href="index.php" class="btn btn-primary">Continue browsing</a>
	</div>
</section>
<!-- Footer -->
<?php //include 'footer.php'; ?>
</body>
</html>