<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
</head>

<body id="page-top">
    <?php if($this->session->userdata('logged_in')) : ?>
    <?php $this->load->view('dashboard/templates/navbar') ?>

    <div id="wrapper">

    <?php $this->load->view('dashboard/templates/sidebar') ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url() ?>dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    Sobre nós
                </li>
            </ol>

            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row">
                <div class="col">
                    <h2>Sobre nós</h2><?= $about['id'] ?>
                </div>
                <div class="col">
                    <a  method="post" class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/about/editar/<?= $about['id'] ?>" ?><i class="fas fa-edit"></i> Editar</a>
                </div>
            </div>

			<div class="card">
				<div class="card-body">
					<p><?= nl2br($about['content']) ?>
				</div>
			</div>
		</div>
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>

    <?php else : ?>
        <?php $this->load->view('login'); ?>
    <?php endif ?>
  </body>

</html>
