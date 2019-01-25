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

            <!--Flashdatas -->
            <?php $this->load->view('dashboard/flashdata'); ?>
            <!--/-->

            <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#modal-adc"><i class="fas fa-plus"></i> Adicionar nova</button>

            <!-- Modal de adicionar nova mídia-->
            <div class="modal" id="modal-adc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLable">Adicionar nova</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form name="inputMidia" action="new" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name ="url" type="file" class="custom-file-input" id="url">
                                        <label for="url" class="custom-file-label" for="url">Escolha o arquivo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>      

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>

                    <?php foreach((array)$midias as $midia) : ?>
                    <tr>
                        <td>
                            <img src="<?= base_url() ?>assets/uploads/<?= $midia['url'] ?>" style="width:20%">
                        </td>
                        <td> 
                            <a class="btn btn-danger btn-sm disabled" href="<?= base_url('dashboard/midia/remover?id='.$midia['id']) ?>">
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
        <?php $this->load->view('dashboard/login'); ?>
  </body>

</html>
