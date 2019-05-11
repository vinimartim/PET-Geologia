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
            <div class="row">
                <div class="col" >
                    <h3 style="display: inline-block">Usuários</h3>
                    <span class="text-muted ml-2"><?= count($users) ?> registros</span>
                </div>
                <div class="col">
                    <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/users/cadastrar" ><i class="fas fa-plus mr-2"></i> Novo</a>
                </div>
            </div>
            
            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata') ?>
            <!--/-->
            
            <?php if(!count($users)) : ?>
            <p class="text-muted">Desculpe, não há usuários a serem mostradas...</p>
            <?php else : ?>

            <div class="input-group mb-3">
                <input id="search" name="search" type="text" class="form-control" placeholder="Pesquisar por nome" aria-label="Pesquisar por nome" aria-describedby="button-addon2">
            </div>
            

            <div class="table-responsive">
                <table class="table tabela">
                    <tr class="trth">
                        <th><strong>Nome</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Telefone</strong></th>
                        <th><strong>Username</strong></th>
                        <th></th>
                    </tr>

                    <?php foreach((array)$users as $user) : ?>
                    <tr class="tr-class"> 

                        <td class="td-info"><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td class="actions">
                            <div class="dropdown">
                                <button class="btn btn-actions" type="button" id="actions" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v" style="color: grey; font-size: 0.9em"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actions">
                                    <a method="post" href="<?= base_url() ?>dashboard/users/editar/<?= $user['id'] ?>" class="dropdown-item">Editar</a>
                                    <a method="post" href="<?= base_url('dashboard/users/remove?id='.$user['id']) ?>" class="dropdown-item">Remover</a>
                                    
                                </div>
                            </div> 
                            <!--a method="post" class="btn btn-success btn-sm" href="<?= base_url() ?>dashboard/users/editar/<?= $user['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="<?= base_url('dashboard/users/remove?id='.$user['id']) ?>">
                                <i class="fas fa-times"></i>
                            </a-->
                        </td>
                    </tr>
                    <?php endforeach ?>
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
