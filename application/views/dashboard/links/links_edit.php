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
                <?php $this->load->view('dashboard/templates/flashdata') ?>

                <div class="row mb-3">
                    <div class="col">
                        <h3>Editar</h3>
                    </div>
                    <div class="col ">
                        <button type="button" data-toggle="modal" class="btn btn-outline-secondary float-right" data-target=".bd-example-modal-lg"><i class="far fa-question-circle mr-2"></i> Precisa de ajuda para preencher?</button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-4">
                                    <h4>Para preencher o campo de ícone:</h4>
                                    <p class="pl-2">Acesse o site <a href="http://fontawesome.com">Fontawesome</a>, busque um ícone de sua preferência e cole seu código no respectivo campo. Exemplo do código: &lt;i class="fas fa-map-marker-alt"&gt;&lt;/i&gt;.<br></p>

                                    <h4>Para preencher o campo de URL:</h4>
                                    <p class="pl-2">Basta colocar uma URL válida, contendo "http://". Exemplo de URL: http://google.com.br</p>

                                    <button type="button" class="mt-3 ml-auto btn btn-secondary" data-dismiss="modal" style="width: 20%"><i class="fas fa-times mr-2"></i> Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="<?= base_url() ?>dashboard/links/update/<?= $link['id'] ?>" method="post" id="cad_link">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" value="<?= $link['id'] ?>">

                            <div class="form-label-group">
                                <input name="title" type="text" class="form-control" id="title" placeholder="Título" value="<?= $link['title'] ?>" autofocus>              
                                <label for="title" class="col-sm-1 col-form-label">Título</label>
                            </div>

                            <div class="form-label-group">
                                <input name="description" type="text" class="form-control" id="description" value="<?= $link['description'] ?>"placeholder="Descrição">
                                <label for="description" class="col-sm-1 col-form-label">Descrição</label>
                            </div>

                            <div class="form-label-group">
                                <input name="url" type="text" class="form-control" id="url" placeholder="URL" value="<?= $link['url'] ?>">
                                <label for="url" class="col-sm-1 col-form-label">URL</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-label-group">
                                <input name="icon" type="text" class="form-control" id="icon" value='<?= $link['icon'] ?>' placeholder="Ícone">
                                <label for="icon" class="col-sm-1 col-form-label">Ícone</label>
                            </div>

                            <label>Seção que o link deve aparecer:</label>

                            <?php $checkedRadio = 'checked'; ?>
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" id="s_geologia" name="home_section" class="custom-control-input" value="1" <?php if($link['home_section'] == 1) : ?> <?= $checkedRadio ?><?php endif ?>>
                                <label class="custom-control-label" for="s_geologia">A Geologia</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="s_aprendamais" name="home_section" class="custom-control-input" value="2"<?php if($link['home_section'] == 2) : ?> <?= $checkedRadio ?><?php endif ?>>
                                <label class="custom-control-label" for="s_aprendamais">Aprenda +</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" id="s_contatos" name="home_section" class="custom-control-input" value="3" <?php if($link['home_section'] == 3) : ?> <?= $checkedRadio ?><?php endif ?>>
                                <label class="custom-control-label" for="s_contatos">Contatos</label>
                            </div>
                            <br>
                        </div>
                    </div>

                    <button id="enviar-user" type="submit" class="btn btn-primary mt-2"><i class="fas fa-save mr-2"></i>Cadastrar</button>
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
    <script type="text/javascript" src="<?= base_url() ?>assets/js/linksValidation.js"></script>


</body>

   </html>
