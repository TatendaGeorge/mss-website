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
		
		<form method="POST" action="includes/delete.php">
			<h2>Are you sure you want to delete this file?</h2>
			<?php 
				$mid = $_GET['m'];
				$userid = $_GET['u'];

				echo "
			<button type='submit' class='btn btn-secondary' name='no'>No</button>
			<button type'submit' class='btn btn-primary' name='delete'>Yes</button>
            <input type='' name='mid' hidden='' value='$mid'>
            <input type='' name='uid' hidden='' value='$userid'>";
			?>
		</form>
	</div>
</section>
