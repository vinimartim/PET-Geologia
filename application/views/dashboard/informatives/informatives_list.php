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
                    Informativos
                </li>
            </ol>

            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row">
                <div class="col">
                    <h2>Informativos</h2>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/informatives/cadastrar"><i class="fas fa-plus"></i> Novo</a>
                </div>
            </div>
            

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 40%">Título</th>
                        <th>Capa</th>
                        <th>Página Inicial?</th>
                        <th style="width: 15%">Ações</th>
                    </tr>

                    <?php foreach((array)$informatives as $informative) : ?>
                    <tr>
                        <td><?= $informative['title'] ?></td>
                        <td><img src="<?= base_url() ?>assets/uploads/<?= $informative['url'] ?>" style="width:50%"></td>
                        <td>
                          <?php if($informative['home_active'] == '1') : ?>
                          <i class="fas fa-check"></i>
                          <?php else : ?>
                          <i class="fas fa-times"></i>
                          <?php endif ?>
                        </td>  
                        <td>
                            <a class="btn btn-success btn-sm" method="post" href="<?= base_url() ?>dashboard/informatives/editar/<?= $informative['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('dashboard/informatives/remove?id='.$informative['id']) ?>">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>

    <?php else : ?>
        <?php $this->load->view('dashboard/login'); ?>
    <?php endif ?>
  </body>

</html>
