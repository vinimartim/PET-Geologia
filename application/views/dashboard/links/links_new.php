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
                <div class="row mb-3">
                    <div class="col">
                        <h2>Novo link</h2>
                    </div>
                </div>

                <ul id="lista-erros">
                </ul>

                <form action="<?= base_url() ?>dashboard/links/insert" method="post" id="cad_link">
                    <div class="form-label-group">
                        <input name="title" type="text" class="form-control" id="title" placeholder="Título" autofocus>              
                        <label for="title" class="col-sm-1 col-form-label">Título</label>
                    </div>

                    <div class="form-label-group">
                        <input name="description" type="text" class="form-control" id="description" placeholder="Descrição">
                        <label for="description" class="col-sm-1 col-form-label">Descrição</label>
                    </div>

                    <div class="form-label-group">
                        <input name="url" type="text" class="form-control" id="url" placeholder="URL">
                        <label for="url" class="col-sm-1 col-form-label">URL</label>
                    </div>
                    <p class="alert alert-warning py-0"><small>Exemplo de URL: http://exemplo.com.br</small></p>

                    <div class="form-label-group">
                        <input name="icon" type="text" class="form-control" id="icon" placeholder="Ícone">
                        <label for="icon" class="col-sm-1 col-form-label">Ícone</label>
                    </div>

                    <p class="alert alert-warning py-0">
                        <small>Para adicionar um ícone, acesse o site <a href="http://fontawesome.com">Fontawesome</a>, busque um ícone de sua preferência e cole seu respectivo código no campo acima.<br>
                        Exemplo do código: &lt;i class="fas fa-map-marker-alt"&gt;&lt;/i&gt;.<br>
                        </small>
                    </p>

					<p>Seção que o link deve aparecer:</p>
					
					<div class="custom-control custom-radio">
						<input type="radio" id="s_geologia" name="home_section" class="custom-control-input" value="1" checked>
						<label class="custom-control-label" for="s_geologia">A Geologia</label>
					</div>

					<div class="custom-control custom-radio">
						<input type="radio" id="s_aprendamais" name="home_section" class="custom-control-input" value="2">
						<label class="custom-control-label" for="s_aprendamais">Aprenda +</label>
					</div>

					<div class="custom-control custom-radio">
						<input type="radio" id="s_contatos" name="home_section" class="custom-control-input" value="3">
						<label class="custom-control-label" for="s_contatos">Contatos</label>
					</div>
					<br>

                    <button id="enviar-user" type="submit" class="btn btn-primary mt-2">Cadastrar</button>
                </form>


            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

    <?php $this->load->view('dashboard/templates/js') ?>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/validationLinks.js"></script>

</body>

   </html>
