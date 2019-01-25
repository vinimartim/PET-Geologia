<?php if($this->session->flashdata('success')) : ?>
	<p class="alert alert-success alert-dismissible fade show"><?= $this->session->flashdata('success') ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button></p>
<?php endif ?>

<?php if($this->session->flashdata('danger')) : ?>
	<p class="alert alert-danger alert-dismissible fade show"><?= $this->session->flashdata('danger') ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button></p>
<?php endif ?>