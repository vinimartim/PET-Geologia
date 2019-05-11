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
                <div class="col" >
                    <h3 style="display: inline-block">Imagens</h3>
                    <span class="text-muted ml-2"><?= count($images) ?> registros</span>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#modal-adc"><i class="fas fa-plus mr-2"></i> Nova</button>
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

                        <form action="<?= base_url() ?>dashboard/images/insert" method="post" enctype="multipart/form-data" >
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input name ="url" type="file" class="custom-file-input" id="url">
                                        <label for="url" class="custom-file-label" for="url" >Escolha o arquivo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Fechar</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php if(!count($images)) : ?>
            <p class="text-muted">Desculpe, não há imagens a serem mostradas...</p>

            <?php else : ?>
            <div class="row">
                <?php foreach((array)$images as $image) : ?>
                <div class="col-lg-3 align-self-center">
                
                    <div class="card mb-5 ">
                        <img class="card-img-top" src="<?= base_url() ?>assets/uploads/<?= $image['url'] ?>" alt="Card image cap">
                        <div class="card-body p-1">
                            <div class="dropdown float-right">
                                <button class="btn btn-actions" type="button" id="actions" data-toggle="dropdown" aria-haspopup="true">
                                    <i class="fas fa-ellipsis-v" style="color: grey; font-size: 0.9em"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="actions">
                                    <a method="post" href="<?= base_url('dashboard/images/remove?id='.$image['id']) ?>" class="dropdown-item">Remover</a>          
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>    
                <?php endforeach ?>
            </div>
            <?php endif ?>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('dashboard/templates/js') ?>
    <script>
        $('.custom-file-input').on('change',function(){
            var fileName = $(this).val();
            fileName = fileName.substring(fileName.lastIndexOf("\\") + 1, fileName.length);
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
</body>

</html>
