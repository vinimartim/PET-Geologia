<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('dashboard/templates/head') ?>
</head>

<body class="bg-dark">
	<div class="container ">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header text-center">Login</div>
			<div class="card-body">
				<div class="text-center"><img class="img-fluid mb-4 " src="<?= base_url() ?>assets/img/mglogo.png" style="width: 30%"></div>
				<?php $this->load->view('dashboard/templates/flashdata'); ?>
				<form action="<?= base_url() ?>dashboard/auth/auth" method="post" id="login">
					<div class="form-group">
						<div class="form-label-group">
							<input name="username" type="text" id="username" class="form-control" placeholder="Username" autofocus="autofocus">
							<label for="username">Username</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input name="password" type="password" id="password" class="form-control" placeholder="Senha">
							<label for="password">Senha</label>
						</div>
					</div>
					<button class="btn btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
    <script src="<?= base_url() ?>assets/js/additional-methods.js"></script>
    <script src="<?= base_url() ?>assets/js/localization/messages_pt_BR.js"></script>
    <script>
    
        $(document).ready(function() {
            var validator = $('#login').validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
						required: true
					}
                }
            });
            validator.resetForm();
        });
    </script>  
</body>

</html>