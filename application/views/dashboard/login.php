<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap-->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!--Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">Login</div>
			<div class="card-body">
				<?php $this->load->view('dashboard/templates/flashdata'); ?>
				<form action="<?= base_url() ?>dashboard/welcome/auth" method="post">
					<div class="form-group">
						<div class="form-label-group">
							<input name="username" type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
							<label for="username">Username</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input name="password" type="password" id="password" class="form-control" placeholder="Senha" required="required">
							<label for="password">Senha</label>
						</div>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Login</button>
				</form>

				<div class="text-center">
					<a class="d-block small" href="forgot-password.html">Esqueceu sua senha?</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>