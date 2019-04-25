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
            <div class="row">
                <div class="col">
                    <h2>Usuários</h2>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/users/cadastrar" ><i class="fas fa-plus"></i> Novo</a>
                </div>
            </div>
            
            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata') ?>
            <!--/-->
            
            <div class="input-group mb-3">
                <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar por nome" aria-label="Pesquisar por nome" aria-describedby="button-addon2">
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 60%">Nome</th>
                        <th>Username</th>
                        <th style="width: 15%">Acões</th>
                    </tr>

                    <?php foreach((array)$users as $user) : ?>
                    <tr class="tr-class">
                        <td class="td-info"><?= $user['name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <a method="post" class="btn btn-success btn-sm" href="<?= base_url() ?>dashboard/users/editar/<?= $user['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('dashboard/users/remove?id='.$user['id']) ?>">
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
    <script src="<?= base_url() ?>assets/js/search.js"></script>   

    <?php else : ?>
        <?php $this->load->view('login'); ?>
    <?php endif ?>

</body>
</html>
