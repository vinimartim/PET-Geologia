<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.html"><img src="<?= base_url() ?>assets/img/logo.png" style="height: 30px;"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-lg-auto ml-md-0 ">
        <li class="nav-item dropdown no-arrow ml-auto">
            <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#logoutModal"><small><i class="fas fa-user-circle fa-fw"></i> Logout</small></a>
        </li>
    </ul>

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
                    <a class="btn btn-primary" href="<?= base_url() ?>dashboard/welcome/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

</nav>