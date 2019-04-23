<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('dashboard/templates/head') ?>
    
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
                    Imagens
                </li>
            </ol>

            <!--Flashdatas -->
            <?php $this->load->view('dashboard/templates/flashdata'); ?>
            <!--/-->

            <div class="row">
                <div class="col">
                    <h2>Imagens</h2>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#modal-adc"><i class="fas fa-plus"></i> Nova</button>
                </div>
            </div>

            <!-- Modal de adicionar nova imagem-->
            <div class="modal" id="modal-adc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLable">Adicionar nova</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?= base_url() ?>dashboard/images/insert" method="post" enctype="multipart/form-data">
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

                    <?php foreach((array)$images as $image) : ?>
                    <tr>
                        <td>
                            <img src="<?= base_url() ?>assets/uploads/<?= $image['url'] ?>" style="width:20%">
                        </td>
                        <td> 
                            <a class="btn btn-danger btn-sm disabled" href="<?= base_url('dashboard/images/remove?id='.$image['id']) ?>">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>

    <?php else : ?>
        <?php $this->load->view('login'); ?>
    <?php endif ?>
  </body>

</html>
