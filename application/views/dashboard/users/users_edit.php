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
                <div class="row mb-3">
                    <div class="col">
                        <h2>Editar usuário</h2>
                    </div>
                </div>

                <form action="<?= base_url() ?>dashboard/users/update/<?= $users['id'] ?>" method="post" id="cadastrar">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" value="<?= $users['id'] ?>" name="id" id="id">
                            <div class="form-label-group">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nome" autofocus value="<?= $users['name'] ?>">       
                                <label for="name" class="col-sm-1 col-form-label">Nome</label>
                            </div>

                            <div class="form-label-group">
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= $users['email'] ?>">
                                <span id="email_result"></span>
                                <label for="email" class="col-sm-1 col-form-label">Email</label>
                            </div>
                            

                            <div class="form-label-group">
                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefone" value="<?= $users['phone'] ?>">
                                <label for="phone" class="col-sm-1 col-form-label">Telefone</label>
                            </div>                            
                        </div>

                        <div class="col">
                            <div class="form-label-group">
                                <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="<?= $users['username'] ?>">
                                <span id="username_result"></span>
                                <label for="username" class="col-sm-1 col-form-label">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Senha">
                                <label for="password" class="col-sm-1 col-form-label">Senha</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password2" type="password" class="form-control" id="password2" placeholder="Repetir">
                                <label for="password2" class="col-sm-1 col-form-label">Repetir</label>
                            </div>
                        </div>
                    </div>

                    <button id="enviar-user" type="submit" class="btn btn-primary mt-2"><i class="fas fa-save mr-2"></i> Cadastrar</button>
                </form>
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <?php $this->load->view('dashboard/templates/js') ?>
    <script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
    <script src="<?= base_url() ?>assets/js/additional-methods.js"></script>
    <script src="<?= base_url() ?>assets/js/messages_pt_BR.min.js"></script>
    <script src="<?= base_url() ?>assets/js/userEditValidation.min.js"></script>

</body>

   </html>
