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
                <?php $this->load->view('dashboard/templates/flashdata'); ?>
                <h1>Painel administrativo</h1>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php $this->load->view('dashboard/templates/js') ?> 
</body>
</html>