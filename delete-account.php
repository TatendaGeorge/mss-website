<?php include 'header.php';?>
<style>
	.container{
		margin-top: 10rem;
		margin-bottom: 15rem;
	}

	button {
		border: none;
	}
</style>
<section id="albums" class="section bg-light space">
	<div class="container space">
		
		<form method="POST" action="includes/delete-account.php">
			<h2>Are you sure you want to delete this account?</h2>
			<button type="submit" class="btn btn-secondary" name="no">No</button>
			<button type="submit" class="btn btn-primary" name="delete">Yes</button>
		</form>
	</div>
</section>
