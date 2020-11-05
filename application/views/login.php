<div class="wrapper">
	<div class="inner">
		<img src="<?= base_url('assets/img/image-1.png') ?>" alt="" class="image-1">
		<form action="<?= base_url('Auth/proses_login') ?>" method="post">
			<h3>Login Access</h3>
			<?php echo $this->session->flashdata('form_error'); ?>
			<div class="form-holder">
				<span class="lnr lnr-envelope"></span>
				<input type="text" name="username" id="username" class="form-control" placeholder="username">
			</div>
			<div class="form-holder">
				<span class="lnr lnr-lock"></span>
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-holder">
				<span class="lnr lnr-user"></span>
				<select class="form-control" id="jabatan" name="jabatan">
					<?php $jabatan = $this->Auth_model->m_jabatan(); ?>
					<?php foreach ($jabatan as $l) { ?>
						<option><?php echo $l['nama_jabatan']; ?> </option>
					<?php } ?>
				</select>
			</div>
			<button>
				<span>Login</span>
			</button>
		</form>
		<img src="<?= base_url('assets/img/image-2.png') ?>" alt="" class="image-2">
	</div>

</div>