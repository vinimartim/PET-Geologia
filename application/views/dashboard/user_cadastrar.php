<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/head') ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/floating-labels.css">
    <!-- Include Editor style. -->
</head>

<body id="page-top">
    <?php $this->load->view('dashboard/navbar') ?>

    <div id="wrapper">
        <?php $this->load->view('dashboard/sidebar') ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>admin/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Páginas
                    </li>
                    <li class="breadcrumb-item active">
                        Cadastrar usuário
                    </li>
                </ol>
     
                <?php $this->load->view('dashboard/flashdata') ?>

                <form action="new" method="post">
                    <div class="form-label-group">
                        <input name="name" type="text" class="form-control form-control-lg" id="name" placeholder="Nome" autofocus>
                        
                        <label for="name" class="col-sm-1 col-form-label">Nome</label>
                    </div>

                    <div class="form-label-group">
                        <input name="username" type="text" class="form-control form-control-lg" id="username" placeholder="Username">
                        <label for="username" class="col-sm-1 col-form-label">Username</label>
                    </div>        

                    <div class="form-label-group">
                        <input name="senha" type="password" class="form-control form-control-lg" id="senha" placeholder="Username">
                        <label for="senha" class="col-sm-1 col-form-label">Senha</label>
                    </div>

                    <div class="form-label-group">
                        <input name="senha2" type="password" class="form-control form-control-lg" id="senha2" placeholder="Confirmar&#32senha">
                        <label for="senha2" class="col-sm-1 col-form-label">Confirmar&#32senha</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
                </form>


                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2018</span>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <?php $this->load->view('dashboard/js') ?>

</body>

   </html>
