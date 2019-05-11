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
                    <h3 style="display: inline-block">Links</h3>
                    <span class="text-muted ml-2"><?= count($links) ?> registros</span>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/links/cadastrar"><i class="fas fa-plus mr-2"></i> Novo</a>
                </div>
            </div>
            
            <?php if(!count($links)) : ?>
            <p class="text-muted">Desculpe, não há informativos a serem mostrados...</p>
            <?php else : ?>

            <div class="input-group mb-3">
                <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar por título" aria-label="Pesquisar por título" aria-describedby="button-addon2">
            </div>       
            

            <div class="table-responsive">
                <table class="table tabela">
                    <tbody>
                        <tr class="trth">
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Ícone</th>
                            <th>Seção</th>
                            <th></th>
                        </tr>

                        <?php foreach((array)$links as $link) : ?>
                        <tr class="tr-class">
                            <td class="td-info"><?= $link['title'] ?></td>
                            <td><?= $link['description'] ?></td>
                            <td><div class="fa-2x"><?= $link['icon'] ?></div></td>
                            <td>
                                <?php if($link['home_section'] == 1) : ?>
                                    A Geologia
                                <?php elseif($link['home_section'] == 2) : ?>
                                    Aprenda +
                                <?php else : ?>
                                    Contato
                                <?php endif ?>
                            <td class="actions">
                                <div class="dropdown">
                                    <button class="btn btn-actions" type="button" id="actions" data-toggle="dropdown" aria-haspopup="true">
                                        <i class="fas fa-ellipsis-v" style="color: grey; font-size: 0.9em"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="actions">
                                        <a method="post" href="<?= base_url() ?>dashboard/links/editar/<?= $link['id'] ?>" class="dropdown-item">Editar</a>
                                        <a method="post" href="<?= base_url('dashboard/links/remove?id='.$link['id']) ?>" class="dropdown-item">Remover</a>
                                    </div>
                                </div> 
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php endif ?>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
    <script src="<?= base_url() ?>assets/js/search.js"></script>   
</body>

</html>
