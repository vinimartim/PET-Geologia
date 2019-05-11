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
    <?php $this->load->view('dashboard/templates/navbar') ?>

    <div id="wrapper">

    <?php $this->load->view('dashboard/templates/sidebar') ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <h2>Editar informativo</h2>
                </div>
            </div>

            <?php $user_id = $this->session->userdata('id'); ?>
            <form name="inputPagina" method="post" action="<?= base_url() ?>dashboard/informatives/update/<?= $informatives['id'] ?>" enctype="multipart/form-data">
                
                <input name="id" type="hidden" id="id" value="<?= $informatives['id'] ?>">
               
                <input name="user_id" type="hidden" id="user_id" value="<?= $informatives['user_id'] ?>">
                
                <div class="form-label-group">
                    <input name="title" type="text" class="form-control" id="title" placeholder="Título" value="<?= $informatives['title'] ?>" autofocus>
                    <label for="title" class="col-sm-1 col-form-label">Título</label>
                </div>

                <div class="form-group mt-3">
                    <textarea rows="8" name="content" class="form-control" id="trumbowyg" placeholder="Conteúdo"><?= $informatives['content'] ?></textarea>
                </div>

                <button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target=".bd-example-modal-xl">
                    <i class="fas fa-images mr-2"></i> Galeria
                </button>

                <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="container p-3">
    
                            <div class="text-center">
                                <img class="img-fluid img-thumbnail" style="width:20%" src="<?= base_url() ?>assets/uploads/<?= $informatives['url'] ?>">
                                <p class="text-muted">Imagem atual</p>
                            </div>



                            <h2 class="mb-2">Seleciona uma nova imagem</h2>

                            <div class="row">
                                <?php if(count($images) == 0) : ?>
                                    <div class="container p-3 text-center">
                                        <p>Não há imagens na galeria.</p><br>
                                        <a href="<?= base_url() ?>dashboard/images/index">Adicionar</a>
                                    </div>
                                <?php else : ?>
                                <?php foreach((array)$images as $image) : ?>

                                <?php if($image['url'] == $informatives['url']) {
                                        $checked_radio = 'checked';
                                    } else {
                                        $checked_radio = '';
                                    }
                                ?>

                                <div class="col-lg-3 mb-3">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="url" id="<?= $image['url'] ?>" value="<?= $image['url'] ?>" <?= $checked_radio ?>>
                                        <label class="custom-control-label" for="<?= $image['url'] ?>">
                                            <img class="img-fluid" src="<?= base_url() ?>assets/uploads/<?= $image['url'] ?>">
                                        </label>
                                    </div>   
                                </div>

                                <?php endforeach ?>
                                <?php endif ?>
                            </div>

                            <button type="button" class="mt-3 ml-2 float-right btn btn-success" data-dismiss="modal"><i class=" fas fa-check mr-2"></i> Selecionar</button>

                            <button type="button" class="mt-3 float-right btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Fechar</button>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="home_active" class="custom-control-input" id="home_active" value="1" checked>
                    <label class="custom-control-label mb-1" for="home_active">Página de início?</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save mr-2"></i>Salvar</button>
            </form>
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
    <script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
    <script src="<?= base_url() ?>assets/js/additional-methods.js"></script>
    <script src="<?= base_url() ?>assets/js/messages_pt_BR.min.js"></script>
    <script>
        $(document).ready(function() {
            var validator = $('#cad-info').validate({
                rules: {
                    title: {
                        required: true
                    },
                    content: {
                        required: true
                    },
                    url: {
                        required:true
                    }
                }

            });
            validator.resetForm();
        });
    </script>

  </body>

</html>
