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

            <div class="row">
                <div class="col">
                    <h2>Links</h2>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/links/cadastrar"><i class="fas fa-plus"></i> Novo</a>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar por título" aria-label="Pesquisar por título" aria-describedby="button-addon2">
            </div>            

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th >Título</th>
                        <th>Descricao</th>
                        <th>Ícone</th>
						<th>Seção</th>
                        <th style="width: 15%">Ações</th>
                    </tr>

                    <?php foreach((array)$links as $link) : ?>
                    <tr class="tr-class">
                        <td class="td-info"><?= $link['title'] ?></td>
                        <td><?= $link['description'] ?></td>
                        <td><div class="fa-2x"><?= $link['icon'] ?></div></td>
						<td>
							<?php if($link['home_section'] == 1) : ?>
								A Geologia
							<?php elseif($link['home_section'] == 2) : ?>
								Aprenda +
							<?php else : ?>
								Contato
							<?php endif ?>
                        <td>
                            <a method="post" href="<?= base_url() ?>dashboard/links/editar/<?= $link['id'] ?>"><i class="fas fa-edit" style="color: green"></i></a>
                            <a href="<?= base_url('dashboard/links/remove?id='.$link['id']) ?>"><i class="fas fa-times" style="color: red"></i></a>
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
    <script src="<?= base_url() ?>assets/js/search.js"></script>   

    <?php else : ?>
        <?php $this->load->view('dashboard/login'); ?>
    <?php endif ?>
  </body>

</html>
