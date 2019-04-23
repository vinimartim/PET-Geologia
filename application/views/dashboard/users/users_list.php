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
                    <a href="<?= base_url() ?>admin/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    Usuários
                </li>
            </ol>

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
            
            <form action="filtrar" method="post">
                <div class="input-group mb-3">
                    <input name="busca" type="text" class="form-control" placeholder="Pesquisar por nome ou username" aria-label="Pesquisar por nome ou username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
                    </div>
                </div>
            </form>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 60%">Nome</th>
                        <th>Username</th>
                        <th style="width: 15%">Acões</th>
                    </tr>

                    <?php foreach((array)$users as $user) : ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
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

    <?php else : ?>
        <?php $this->load->view('login'); ?>
    <?php endif ?>

</body>
</html>
