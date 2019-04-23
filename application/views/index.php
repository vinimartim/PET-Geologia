<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Bootstrap-->
	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom fonts for this template -->
	
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!--Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- Plugin CSS -->
	<link href="<?= base_url() ?>assets/css/magnific-popup.css" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>assets/css/creative.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger navbrand" href="#page-top">
				<img class="img-fluid" src="<?= base_url() ?>assets/img/logoalt.png" style="height: 50px;">
			</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#sobre">Sobre nós</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#geologia">A Geologia</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#aprendamais">Aprenda mais</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#contato">Fale conosco</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<header class="masthead text-center text-white d-flex">
		<div class="container my-auto">
			<?php $this->load->view('dashboard/templates/flashdata'); ?>
			<div class="row">
				<div class="col-lg-10 mx-auto">
					<h1 class="text-uppercase" style="letter-spacing: 5px;">
						<strong>PET-Geologia</strong>
					</h1>
					<hr>
				</div>
				<div class="col-lg-8 mx-auto">
					<p class="text-faded mb-5">Universidade Estadual Paulista - UNESP</p>
				</div>
			</div>
		</div>
	</header>

	<section class="bg-primary" id="sobre">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="section-heading text-white">Sobre nós</h2>
					<hr class="light my-4">
					<p class="text-faded mb-4 text-justify"><?= nl2br($about['content']) ?></p>
				</div>
			</div>
		</div>
	</section>

	<section id="geologia">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">A Geologia</h2>
					<hr class="my-4">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php foreach((array) $links as $link) : ?>
				<?php if($link['home_section'] == 1) : ?>
				<div class="col text-center">
					<div class="service-box mt-5 mx-auto ">
						<a class="link" href="<?= $link['url'] ?>">
							<div class="fa-4x sr-icon-1"><?= $link['icon'] ?></div>
							<h3 class="mb-3"><?= $link['title'] ?></h3>
						</a>
						<p class="text-muted mb-0"><?= $link['description'] ?></p>
					</div>
				</div>
				<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<section class="p-0 text-uppercase" id="portfolio">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<?php foreach((array)$informatives as $informative) : ?>
				<?php $id_modal = str_replace(' ', '', $informative['title']); ?>
				<div class="col-lg-4 col-sm-6">
					<a class="portfolio-box pointer" data-toggle="modal" data-target="#modal-<?= $id_modal ?>">
						<img class="img-fluid" src="<?= base_url() ?>assets/uploads/<?= $informative['url'] ?>" alt="">
						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-name ">
									<?= $informative['title'] ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				
				<!-- MODAL -->
				<div class="modal" id="modal-<?= $id_modal ?>" tabindex="-1" role="dialog" aria-labelledby="modal-modal-<?= $id_modal ?>-label" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modal-modal-<?= $id_modal ?>-label"><?= $informative['title'] ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<?= $informative['content'] ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">fECHAR</button>

							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<section class="bg-dark text-white" id="aprendamais">
		<div class="container text-center">
			<h2 class="mb-4">Aprenda <i class="fas fa-plus"></i></h2>
			<div class="container">
				<div class="row">
				<?php foreach((array) $links as $link) : ?>
				<?php if($link['home_section'] == 2) : ?>
					<div class="col text-center">
						<div class="service-box mt-5 mx-auto">
							<a class="link" href="<?= $link['url'] ?>">
								<div class="fa-4x sr-icon-1"><?= $link['icon'] ?></div>
								<h3 class="mb-3"><?= $link['title'] ?></h3>
							</a>
							<p class="text-muted mb-0"><?= $link['description'] ?></p>
						</div>
					</div>
				<?php endif ?>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>

	<section id="contato">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="section-heading">Fale conosco!</h2>
					<hr class="my-4">
					<p class="mb-5">Você pode mandar uma mensagem para nós com dúvidas, sugestões ou curiosidades.</p>
				</div>
			</div>

			<div class="row no-gutters">
				<?php foreach((array) $links as $link) : ?>
				<?php if($link['home_section'] == 3) : ?>
				<div class="col text-center">
					<div class="fa-3x"><?= $link['icon'] ?></div>
					<p><?= $link['description'] ?></p>
				</div>
				<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="<?= base_url() ?>assets/js/jquery.easing.min.js"></script>
	<script src="<?= base_url() ?>assets/js/scrollreveal.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="<?= base_url() ?>assets/js/creative.min.js"></script>

</body>
</html>
