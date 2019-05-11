<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('dashboard/templates/head') ?>
</head>

<body class="bg-dark">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-lg-8">
				<div class="card mt-5 text-center">
					<div class="card-title"><h1 class="display-4 mt-3">Erro 404</h1></div>
					<div class="card-body">
						<p>Ops... parece que você tentou acessar uma página que não existe.</p>
						<p><a href="<?= base_url() ?>">Clique aqui</a> e retorna para a página inicial.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>