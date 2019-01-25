<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/head') ?>
    <!-- Include Editor style. -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_editor.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/css/froala_style.min.css' rel='stylesheet' type='text/css'>
    <link href='<?= base_url() ?>assets/css/file.min.css' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>

<body id="page-top">
    <?php if($this->session->userdata('logged_in')) : ?>
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
                    Cadastrar página
                </li>
            </ol>
           

            <?php $user_id = $this->session->userdata('id'); ?>
            <form name="inputPagina" method="post" action="salvar/<?= $paginas['id'] ?>" enctype="multipart/form-data">
                
                <input name="id" type="hidden" id="id" value="<?= $paginas['id'] ?>">
               
                <input name="user_id" type="hidden" id="user_id" value="<?= $paginas['user_id'] ?>">
                
                <div class="form-label-group">
                    <input name="titulo" type="text" class="form-control form-control-lg" id="inputTitulo" placeholder="Título" value="<?= $paginas['titulo'] ?>" autofocus>
                    <label for="inputTitulo" class="col-sm-1 col-form-label">Título</label>
                </div>

                <div class="form-group mt-3">
                    <textarea name="conteudo" class="form-control form-control-lg" id="trumbowyg" placeholder="Conteúdo"><?= $paginas['conteudo'] ?></textarea>
                </div>

                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Escolher da galeria de mídias
                </button>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="row">
                            <?php foreach((array)$midias as $midia) : ?>
                                <?php 

                                if($midia['url'] == $paginas['url']) {
                                    $checked_radio = 'checked';
                                } else {
                                    $checked_radio = '';
                                }

                                if($paginas['atv_inicio'] == 1) {
                                    $checked_box = 'checked';
                                } else {
                                    $checked_box = '';
                                }

                                ?>

                            <div class="col">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="url" id="<?= $midia['url'] ?>" value="<?= $midia['url'] ?>" <?= $checked_radio ?>>
                                    <label class="custom-control-label" for="<?= $midia['url'] ?>">
                                        <img style="width: 50%" src="<?= base_url() ?>assets/uploads/<?= $midia['url'] ?>">
                                    </label>
                                </div>   
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" style="background-color: lightgrey">
                        <p>Pré-vizualização da imagem a ser alterada</p>
                        <img style="width:30%" src="<?= base_url() ?>assets/uploads/<?= $paginas['url'] ?>">
                    </div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="atv_inicio" class="custom-control-input" id="atv_inicio" value="1" <?= $checked_box ?>>
                    <label class="custom-control-label mb-1" for="atv_inicio">Página de inicio?</label>
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

    <?php $this->load->view('dashboard/js') ?>
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
