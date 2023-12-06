<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('asset/carbook-master/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Login</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row d-flex mb-5 contact-info">

			<div class="col-md-8 block-9 mb-md-5">
				<?php if ($this->session->userdata('error')) {
				?>
					<div class="alert alert-danger" role="alert">
						<?= $this->session->userdata('error') ?>
					</div>
				<?php
				} ?>
				<?php
				if ($this->session->userdata('success')) {
				?>
					<div class="alert alert-success" role="alert">
						<?= $this->session->userdata('success') ?>
					</div>
				<?php
				}
				?>
				<form action="<?= base_url('Konsumen/cLogin/add_login') ?>" method="POST" class="bg-light p-5 contact-form">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
					</div>
					<div class="form-group mb-3">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
					</div>
					Apakah Anda Belum Memilik Akun? <a href="<?= base_url('Konsumen/cLogin/registrasi') ?>">Silahkan Registrasi</a>
					<div class="form-group">

						<input type="submit" value="Login" class="btn btn-primary py-3 px-5 mt-3">
					</div>
				</form>

			</div>
		</div>
	</div>
</section>