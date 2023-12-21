<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-user-plus bg-blue"></i>
						<div class="d-inline">
							<h5>Reservasi Service</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<nav class="breadcrumb-container" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="../index.html"><i class="ik ik-home"></i></a>
							</li>
							<li class="breadcrumb-item">
								<a href="#">Tables</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Reservasi</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>

		<?php
		if ($this->session->userdata('success') != '') {
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<div class="alert-icon">
					<i class="zmdi zmdi-notifications-none"></i>
				</div>
				<div class="alert-message">
					<span><strong>Success!</strong> <?= $this->session->userdata('success') ?></span>
				</div>
			</div>
		<?php
		}
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Informasi Reservasi Service</h3>

					</div>
					<div class="card-body">
						<table id="data_table" class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Pelanggan</th>
									<th scope="col">Plat Kendaraan</th>
									<th scope="col">Model Kendaraan</th>
									<th scope="col">Brand Kendaraan</th>
									<th scope="col">Status Reservasi</th>
									<th scope="col">Estimasi Waktu</th>
									<th scope="col">Konfirmasi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($transaksi['mekanik'] as $key => $value) {
								?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $value->nama_pelanggan ?></td>
										<td><?= $value->plat_kendaraan ?></td>
										<td><?= $value->model_kendaraan ?></td>
										<td><?= $value->brand_kendaraan ?></td>
										<td><span class="badge bg-info">Proses Service</span></td>
										<td>
											<?php
											if ($value->estimasi_service == NULL) {
											?>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#demoModal<?= $value->id_reservasi ?>">Estimasi Pengerjaan</button>

											<?php
											} else {
												echo $value->estimasi_service;
											}
											?>
										</td>
										<td class="text-center">
											<?php
											if ($value->estimasi_service != NULL) {
											?>
												<div class="table-actions">
													<a href="<?= base_url('Mekanik/cTransaksi/detail_service/' . $value->id_reservasi) ?>"><i class="ik ik-check-circle"></i></a>
												</div>
											<?php
											}
											?>

										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
foreach ($transaksi['mekanik'] as $key => $value) {
?>
	<div class="modal fade" id="demoModal<?= $value->id_reservasi ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="demoModalLabel">Masukkan Estimasi Proses Service</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form action="<?= base_url('Mekanik/cTransaksi/estimasi_waktu/' . $value->id_reservasi) ?>" method="POST">
					<div class="modal-body">
						<label>Estimasi Waktu</label>
						<input type="time" min="08:00" max="16:00" class="form-control" name="waktu" required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}
?>