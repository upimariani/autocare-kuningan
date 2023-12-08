<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('asset/carbook-master/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Registrasi</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section">
	<div class="container">
		<div class="row d-flex mb-5 contact-info">

			<div class="col-md-8 block-9 mb-md-5">
				<form action="<?= base_url('Konsumen/cLogin/add_registrasi') ?>" method="POST" class="bg-light p-5 contact-form">
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pelanggan" required>
					</div>
					<div class="form-group mb-3">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
					</div>
					<div class="form-group mb-3">
						<label>No Telepon</label>
						<input type="number" name="no_hp" class="form-control" placeholder="Masukkan No Telepon" required>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group mb-3">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group mb-3">
								<label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
							</div>
						</div>
					</div>
					Apakah Anda Sudah Memilik Akun? <a href="<?= base_url('Konsumen/cLogin') ?>">Silahkan Login</a>
					<div class="form-group">

						<input type="submit" value="Registrasi" class="btn btn-primary py-3 px-5 mt-3">
					</div>
				</form>

			</div>
		</div>
	</div>
</section>