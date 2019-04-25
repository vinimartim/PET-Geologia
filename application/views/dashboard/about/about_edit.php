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
            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row mb-3">
                <div class="col">
                    <h2>Editar sobre nós</h2>
                </div>
            </div>

			<form action="<?= base_url() ?>dashboard/about/update/<?= $about['id'] ?>" method="post">
				<input type="hidden" name="id" value="<?= $about['id']?>">
				<textarea rows="10" class="form-control" name="content" id="content"><?= $about['content'] ?></textarea>
            	
				<button  type="submit" class="btn btn-success mt-3 float-right"><i class="fas fa-edit"></i> Salvar</button>
			</form>
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
