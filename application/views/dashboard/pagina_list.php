<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/head') ?>
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
            </ol>

            <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/pagina/cadastrar"><i class="fas fa-plus"></i> Cadastrar nova</a>       

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 40%">Título</th>
                        <th>Capa</th>
                        <th>Página Inicial?</th>
                        <th style="width: 15%">Ações</th>
                    </tr>

                    <?php foreach((array)$paginas as $pagina) : ?>
                    <tr>
                        <td><?= $pagina['titulo'] ?></td>
                        <td><img src="<?= base_url() ?>assets/uploads/<?= $pagina['url'] ?>" style="width:50%"></td>
                        <td>
                          <?php if($pagina['atv_inicio'] == '1') : ?>
                          <i class="fas fa-check"></i>
                          <?php else : ?>
                          <i class="fas fa-times"></i>
                          <?php endif ?>
                        </td>  
                        <td>
                            <a class="btn btn-success btn-sm" href="<?= base_url('dashboard/pagina/editar?id='.$pagina['id']) ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm disabled" href="<?= base_url('dashboard/pagina/remover?id='.$pagina['id']) ?>">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        
          

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

    <?php else : ?>
    <div class="container">
        <div class="alert alert-danger">
            <h2>Desculpe, mas...</h2>
            <p>Você não tem permissões necessárias para acessar essa página. Clique <a href="<?= base_url() ?>">aqui</a> e retorne ao início.</p>
        </div>
    </div>
    <?php endif ?>
  </body>

</html>
