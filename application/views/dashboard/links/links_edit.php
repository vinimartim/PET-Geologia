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
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>admin/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Links
                    </li>
                    <li class="breadcrumb-item active">
                        Editar link
                    </li>
                </ol>
     
                <?php $this->load->view('dashboard/templates/flashdata') ?>

                <ul id="lista-erros">
                </ul>

                <form action="<?= base_url() ?>dashboard/links/update/<?= $link['id'] ?>" method="post" id="cadastrar">
					<input type="hidden" name="id" value="<?= $link['id'] ?>">

                    <div class="form-label-group">
                        <input name="title" type="text" class="form-control" id="title" placeholder="Título" value="<?= $link['title'] ?>" autofocus>              
                        <label for="title" class="col-sm-1 col-form-label">Título</label>
                    </div>

                    <div class="form-label-group">
                        <input name="description" type="text" class="form-control" id="description" value="<?= $link['description'] ?>"placeholder="Descrição">
                        <label for="description" class="col-sm-1 col-form-label">Descrição</label>
                    </div>

					<label class="sr-only" for="inlineFormInputGroup">URL</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
						<div class="input-group-text">http://</div>
						</div>
						<input type="text" class="form-control" id="inlineFormInputGroup" value="<?= $link['url'] ?>" placeholder="URL" style="height: 50px;">
					</div>
					
					<p class="alert alert-warning">
						<small>Para adicionar um ícone, acesse o site <a href="http://fontawesome.com">Fontawesome</a>, busque um ícone de sua preferência e cole seu respectivo código no campo abaixo.<br>
						Exemplo do código: &lt;i class="fas fa-map-marker-alt"&gt;&lt;/i&gt;<br>
                        Lembre-se que cada seção fica estéticamente melhor com <strong>três</strong> ícones
						</small>
					</p>

                    <div class="form-label-group">
                        <input name="icon" type="text" class="form-control" id="icon" value='<?= $link['icon'] ?>' placeholder="Ícone">
                        <label for="icon" class="col-sm-1 col-form-label">Ícone</label>
                    </div>

					<p>Seção que o link deve aparecer:</p>

					<?php $checkedRadio = 'checked'; ?>
					
					<div class="custom-control custom-radio">
						<input type="radio" id="s_geologia" name="home_section" class="custom-control-input" value="1" <?php if($link['home_section'] == 1) : ?> <?= $checkedRadio ?><?php endif ?>>
						<label class="custom-control-label" for="s_geologia">A Geologia</label>
					</div>

					<div class="custom-control custom-radio">
						<input type="radio" id="s_aprendamais" name="home_section" class="custom-control-input" value="2"<?php if($link['home_section'] == 2) : ?> <?= $checkedRadio ?><?php endif ?>>
						<label class="custom-control-label" for="s_aprendamais">Aprenda +</label>
					</div>

					<div class="custom-control custom-radio">
						<input type="radio" id="s_contatos" name="home_section" class="custom-control-input" value="3" <?php if($link['home_section'] == 3) : ?> <?= $checkedRadio ?><?php endif ?>>
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

</body>

   </html>
