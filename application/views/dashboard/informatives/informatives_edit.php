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
                    Páginas
                </li>
                <li class="breadcrumb-item active">
                    Cadastrar página
                </li>
            </ol>
           

            <?php $user_id = $this->session->userdata('id'); ?>
            <form name="inputPagina" method="post" action="<?= base_url() ?>dashboard/informatives/update/<?= $informatives['id'] ?>" enctype="multipart/form-data">
                
                <input name="id" type="hidden" id="id" value="<?= $informatives['id'] ?>">
               
                <input name="user_id" type="hidden" id="user_id" value="<?= $informatives['user_id'] ?>">
                
                <div class="form-label-group">
                    <input name="title" type="text" class="form-control form-control-lg" id="title" placeholder="Título" value="<?= $informatives['title'] ?>" autofocus>
                    <label for="title" class="col-sm-1 col-form-label">Título</label>
                </div>

                <div class="form-group mt-3">
                    <textarea name="content" class="form-control form-control-lg" id="trumbowyg" placeholder="Conteúdo"><?= $informatives['content'] ?></textarea>
                </div>

                <button class="btn btn-success mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-images"></i> Galeria
                </button>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body mb-3">
                        <div class="row">

                        <?php if(count($images) == 0) : ?>
                            <p>Não há imagens na galeria.<br>
                            <a href="<?= base_url() ?>dashboard/images/list">Adicionar</a>
                        <?php else : ?>
                        <?php foreach((array)$images as $image) : ?>

                        <?php if($image['url'] == $informatives['url']) {
                                $checked_radio = 'checked';
                            } else {
                                $checked_radio = '';
                            }
                        ?>

                        <div class="col">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="url" id="<?= $image['url'] ?>" value="<?= $image['url'] ?>" <?= $checked_radio ?>>
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

                <div class="card mb-3">
                    <div class="card-body" style="background-color: lightgrey">
                        <p>Pré-vizualização da imagem a ser alterada</p>
                        <img style="width:30%" src="<?= base_url() ?>assets/uploads/<?= $informatives['url'] ?>">
                    </div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="home_active" class="custom-control-input" id="home_active" value="1" checked>
                    <label class="custom-control-label mb-1" for="home_active">Página de início?</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Salvar</button>
            </form>
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
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
