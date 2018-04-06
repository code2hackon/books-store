<?php
	$title = "Administration section";
	require_once "./template/header.php";
?>

	<form class="form-horizontal" method="post" action="signin.php">
		<div class="form-group">
			<label for="username" class="control-label col-md-4">Username</label>
			<div class="col-md-4">
				<input type="text" name="username" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="control-label col-md-4">Password</label>
			<div class="col-md-4">
				<input type="password" name="password" class="form-control">
			</div>
		</div>
		<input type="submit" name="admin_login" class="btn btn-primary">
	</form>

<?php
	require_once "./template/footer.php";
?>
