<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/floating-labels.css">
    <!-- Include Editor style. -->
</head>

<body id="page-top">
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
                        Usuários
                    </li>
                    <li class="breadcrumb-item active">
                        Editar usuário
                    </li>
                </ol>
     
                <?php $this->load->view('dashboard/templates/flashdata') ?>

                <ul id="lista-erros">
                </ul>

                <form action="<?= base_url() ?>dashboard/users/update/<?= $users['id'] ?>" method="post" id="cadastrar">

					<input name="id" type="hidden" value="<?= $users['id'] ?>">

                    <div class="form-label-group">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Nome" value="<?= $users['name'] ?>" autofocus>              
                        <label for="name" class="col-sm-1 col-form-label">Nome</label>
                    </div>

                    <div class="form-label-group">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="<?= $users['username'] ?>">
                        <label for="username" class="col-sm-1 col-form-label">Username</label>
                    </div>

                    <div class="form-label-group">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" >
                        <label for="senha" class="col-sm-1 col-form-label">Senha</label>
                    </div>

                    <div class="form-label-group">
                        <input name="senha2" type="password" class="form-control" id="senha2" placeholder="Repetir">
                        <label for="senha2" class="col-sm-1 col-form-label">Repetir</label>
                    </div>

                    <button id="enviar-user" type="submit" class="btn btn-primary mt-2">Salvar</button>
                </form>
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <?php $this->load->view('dashboard/templates/js') ?>
    <script src="<?= base_url() ?>assets/js/form_validation.js"></script>

</body>

   </html>
