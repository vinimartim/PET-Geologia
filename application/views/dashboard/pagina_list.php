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
                    Usuários
                </li>
            </ol>

            
            <a class="btn btn-primary mb-3 float-right" href="<?= base_url() ?>dashboard/pagina/cadastrar">Cadastrar nova</a>
            

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 50%">Título</th>
                        <th>Capa</th>
                        <th>Página Inicial?</th>
                        <th style="width: 15%">Ações</th>
                    </tr>

                    <?php foreach((array)$paginas as $pagina) : ?>
                    <tr>
                        <td><?= $pagina['titulo'] ?></td>
                        <td><img src="<?= base_url() ?>assets/uploads/<?= $pagina['capa'] ?>" style="width:50%"></td>
                        <td>
                          <?php if($pagina['atv_inicio'] == '1') : ?>
                          <i class="fas fa-check"></i>
                          <?php else : ?>
                          <i class="fas fa-times"></i>
                          <?php endif ?>
                        </td>  
                        <td>
                          <a href="<?= base_url('dashboard/pagina/editar?id='.$pagina['id']) ?>">
                            Editar
                        </a> | 
                          <a href="<?= base_url('dashboard/pagina/remover?id='.$pagina['id']) ?>">
                            Remover
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url() ?>admin/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

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
