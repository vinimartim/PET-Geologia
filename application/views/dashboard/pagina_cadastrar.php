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
            <form name="inputPagina" method="post" action="new" enctype="multipart/form-data" mult>
                <div class="form-label-group">
                    <input name="user_id" type="hidden" class="form-control form-control-lg" id="id" placeholder="id" autofocus value="<?= $user_id ?>">
                    <label for="user_id" class="col-sm-1 col-form-label"></label>
                </div>


                <div class="form-label-group">
                    <input name="titulo" type="text" class="form-control form-control-lg" id="inputTitulo" placeholder="Título" autofocus>
                    <label for="inputTitulo" class="col-sm-1 col-form-label">Título</label>
                </div>

                <div class="form-group mt-3">
                    
                    <textarea name="conteudo" class="form-control form-control-lg" id="trumbowyg" placeholder="Conteúdo" autofocus></textarea>

                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input name ="capa" type="file" class="custom-file-input" id="capa">
                        <label for="capa" class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="atv_inicio" class="custom-control-input" id="atv_inicio" value="1" checked>
                    <label class="custom-control-label" for="atv_inicio">Página de inicio?</label>
                </div>
        
       
            <button type="submit" class="btn btn-primary">Cadastrar</button>
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
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/file.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/url.min.js'></script>
    <script type='text/javascript' src='<?= base_url() ?>assets/js/link.min.js'></script>

    <script> $(function() { $('textarea').froalaEditor() }); </script>

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
