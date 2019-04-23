<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
    <!-- Include Editor style. -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet' type='text/css'>
    <link href='<?= base_url() ?>assets/css/file.min.css' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                    <li class="breadcrumb-item active">
                        Cadastrar
                    </li>
                </ol>
                

                <?php $user_id = $this->session->userdata('id'); ?>
                <form method="post" action="<?= base_url() ?>dashboard/informatives/insert" enctype="multipart/form-data" mult>
                    <div class="form-label-group">
                        <input name="user_id" type="hidden" class="form-control form-control-lg" id="id" placeholder="id" autofocus value="<?= $user_id ?>">
                        <label for="user_id" class="col-sm-1 col-form-label"></label>
                    </div>

                    <div class="form-label-group">
                        <input name="title" type="text" class="form-control form-control-lg" id="title" placeholder="Título" autofocus>
                        <label for="title" class="col-sm-1 col-form-label">Título</label>
                    </div>

                    <div class="form-group mt-3">                   
                        <textarea name="content" class="form-control form-control-lg" id="trumbowyg" placeholder="Conteúdo" autofocus></textarea>
                    </div>

                    <button class="btn btn-success mb-3" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
                        <i class="fas fa-images"></i> Galeria 
                    </button>

                    <div class="collapse" id="collapse">
                        <div class="card card-body mb-3">
                            <div class="row">
                                <?php if(count($images) == 0) : ?>
                                    <p>Não há imagens na galeria.<br>
                                    <a href="<?= base_url() ?>dashboard/images/list">Adicionar</a>
                                <?php else : ?> 
                                <?php foreach((array)$images as $image) : ?>
                                <div class="col">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="url" id="<?= $image['url'] ?>" value="<?= $image['url'] ?>">
                                        <label class="custom-control-label" for="<?= $image['url'] ?>">
                                            <img style="width: 50%" src="<?= base_url() ?>assets/uploads/<?= $image['url'] ?>">
                                        </label>
                                    </div>   
                                </div>
                                <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="home_active" class="custom-control-input" id="home_active" value="1" checked>
                        <label class="custom-control-label mb-1" for="home_active">Página de inicio?</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Cadastrar</button>
                </form>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <?php $this->load->view('dashboard/templates/js') ?>
    <!-- Scripts Froala Editor -->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/file.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/url.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/link.min.js'></script>

    <script> $(function() { $('textarea').froalaEditor() }); </script>

    <?php else : ?>
       <?php $this->load->view('dashboard/login'); ?>
    <?php endif ?>

</body>

    </html>
