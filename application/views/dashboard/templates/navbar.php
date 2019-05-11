<nav class="navbar navbar-expand static-top">
    <a class="navbar-brand text-center" href="index.html"><img src="<?= base_url() ?>assets/img/mglogo.png" style="height: 30px;"></a>
    <button class="btn btn-link btn-navbar btn-sm order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <?php 
    $name = $this->session->userdata('name');
    $username = $this->session->userdata('username');
    ?>

    <div class="dropdown ml-auto d-flex">
        <i class="fas mt-3 mr-2 fa-arrow-down" style="color:lightgrey"></i>

        <a  class="user" href="#" data-toggle="dropdown" aria-haspopup="true" id="dropuser">
            <h5 class="my-0"><?= $name?></h5>
            <?= $username ?>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropuser">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">Logout</a>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fazer logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Continue se você tem certeza que deseja sair.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url() ?>dashboard/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

</nav>