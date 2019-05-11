<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
</head>

<body id="page-top">
    <?php $this->load->view('dashboard/templates/navbar') ?>

    <div id="wrapper">

    <?php $this->load->view('dashboard/templates/sidebar') ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row">
                <div class="col">
                    <h3>Sobre nós</h3>
                </div>
                <div class="col">
                    <a  method="post" class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/about/editar/<?= $about['id'] ?>" ?><i class="fas fa-edit mr-2"></i> Editar</a>
                </div>
            </div>

			<div class="card">
				<div class="card-body">
					<p><?= html_escape(nl2br($about['content'])) ?>
				</div>
			</div>
		</div>
      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
  </body>

</html>
