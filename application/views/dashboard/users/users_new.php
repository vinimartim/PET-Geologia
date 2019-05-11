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
                        <h3>Cadastrar usuário</h3>
                    </div>
                </div>

                <form action="<?= base_url() ?>dashboard/users/insert" method="post" id="cadastrar">
                    <div class="row">
                        <div class="col">
                            <div class="form-label-group">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nome" autofocus>       
                                <label for="name" class="col-sm-1 col-form-label">Nome</label>
                            </div>

                            <div class="form-label-group">
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                                <span id="email_result"></span>
                                <label for="email" class="col-sm-1 col-form-label">Email</label>
                            </div>
                            

                            <div class="form-label-group">
                                <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefone">
                                <label for="phone" class="col-sm-1 col-form-label">Telefone</label>
                            </div>                            
                        </div>

                        <div class="col">
                            <div class="form-label-group">
                                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                                <span id="username_result"></span>
                                <label for="username" class="col-sm-1 col-form-label">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Username">
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
    <script src="<?= base_url() ?>assets/js/vanilla-masker.min.js"></script>
    <script src="<?= base_url() ?>assets/js/phoneMask.js"></script>
    <script>
        $(document).ready(function() {
            var validator = $('#cadastrar').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 100,
                        minlength: 10,
                        minWords: 2
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "<?= base_url()?>dashboard/users/registerEmailExists",
                            type: "post",
                            data: {
                                email: function(){ return $("#email").val(); }
                            }
                        }
                    },
                    phone: {
                        required: true,
                        maxlength: 15,
                        minlength: 10
                    },
                    username: {
                        required: true,
                        maxlength: 12,
                        minlength: 4,
                        remote: {
                            url: "<?= base_url()?>dashboard/users/registerUsernameExists",
                            type: "post",
                            data: {
                                email: function(){ return $("#username").val(); }
                            }
                        }
                    },
                    password: {
                        required: true,
                        maxlength: 12,
                        minlength: 6
                    },
                    password2: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        remote: 'Esse email já está em uso.'
                    },
                    username: {
                        remote: 'Esse username já está em uso.'
                    }
                }

            });
            validator.resetForm();
        });
    </script>
      

</body>

   </html>
