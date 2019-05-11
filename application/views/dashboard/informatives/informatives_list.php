<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
</head>

<body id="page-top">
    <?php $this->load->view('dashboard/templates/navbar') ?>

    <div id="wrapper">

    <?php $this->load->view('dashboard/templates/sidebar') ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row">
                <div class="col">
                    <h2 style="display: inline-block">Informativos</h2>
                    <span class="text-muted ml-2"><?= count($informatives) ?> registros </span>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/informatives/cadastrar"><i class="fas fa-plus mr-2"></i> Novo</a>
                </div>
            </div>
            
            <?php if(!count($informatives)) : ?>
            <p class="text-muted">Desculpe, não há informativos a serem mostrados...</p>
            <?php else : ?>

            <div class="input-group mb-3">
                <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar por título" aria-label="Pesquisar por título" aria-describedby="button-addon2">
            </div> 

            <div class="table-responsive">
                <table class="table tabela">
                    <tr class="trth">
                        <th style="width: 40%">Título</th>
                        <th style="width: 40%">Capa</th>
                        <th>Home?</th>
                        <th></th>
                    </tr>

                    <?php foreach((array)$informatives as $informative) : ?>
                    <tr class="tr-class">
                        <td class="td-info"><?= $informative['title'] ?></td>
                        <td><img src="<?= base_url() ?>assets/uploads/<?= $informative['url'] ?>" style="width:50%"></td>
                        <td>
                          <?php if($informative['home_active'] == '1') : ?>
                          <i class="fas fa-check"></i>
                          <?php else : ?>
                          <i class="fas fa-times"></i>
                          <?php endif ?>
                        </td>  
                        <td class="actions">
                            <div class="dropdown">
                                <button class="btn btn-actions" type="button" id="actions" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v" style="color: grey; font-size: 0.9em"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actions">
                                    <a method="post" href="<?= base_url() ?>dashboard/informatives/editar/<?= $informative['id'] ?>" class="dropdown-item">Editar</a>
                                    <a method="post" href="<?= base_url('dashboard/informatives/remove?id='.$informative['id']) ?>" class="dropdown-item">Remover</a>
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <?php endif?>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
    <script src="<?= base_url() ?>assets/js/search.js"></script>   
  </body>

</html>
