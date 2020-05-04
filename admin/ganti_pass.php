<?php include 'header.php'; ?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>

<body>

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="index.php" class="pull-right">Back to Beranda</a>
						<h4>Change Password</h4>
					</div>
					<div class="panel-body">

						<?php

						if (isset($_GET['pesan'])) {
							echo '<div class="alert"><strong>' . $_GET['pesan'] . '</strong> </div>';
						}
						?>

						<form action="ganti_pass_act.php" method="post">
							<div class="form-group">
								<input type="password" name="current_password" class="form-control" placeholder="Current Password">
							</div>
							<div class="form-group">
								<input type="password" name="new_password" class="form-control" placeholder="New Password">
							</div>
							<div class="form-group">
								<input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password">
							</div>
							<div class="form-group">
								<button type="submit" name="btnChangePassword" class="btn btn-primary">Change Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>

<?php include 'footer.php'; ?>