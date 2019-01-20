<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PET - Geologia</title>

	<!-- Bootstrap-->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom fonts for this template -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!--Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- Plugin CSS -->
	<link href="<?= base_url() ?>assets/css/magnific-popup.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>assets/css/creative.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/floating-labels.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top" style="background-color: #ffcc2a">

	<!-- Navigation -->
	<div class="container d-flex justify-content-center mt-4 pt-5">
		<div class="col-4">
			<div style="background-color: white; border-radius: 3px; padding: 2em">
				<form name ="userinput" action="<?= base_url() ?>dashboard/user/new" method="post">
					<div class="form-label-group">
						<input name="name" type="text" class="form-control form-control-lg" id="inputName" placeholder="Name" autofocus>
						<label for="Name" class="col-sm-1 col-form-label">Name</label>
					</div>

					<div class="form-label-group">
						<input name="username" type="text" class="form-control form-control-lg" id="inputUsername" placeholder="Username" autofocus>
						<label for="inputUsername" class="col-sm-1 col-form-label">Username</label>
					</div>

					<div class="form-label-group">
						<input name="senha" type="password" class="form-control form-control-lg" id="inputSenha" placeholder="Senha" autofocus>
						<label for="inputName" class="col-sm-1 col-form-label">Senha</label>
					</div>

					<button type="submit" class="btn btn-primary w-100 mt-2">Cadastrar</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.easing.min.js"></script>
	<script src="<?= base_url() ?>assets/js/scrollreveal.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="<?= base_url() ?>assets/js/creative.min.js"></script>
</body>
</html>
