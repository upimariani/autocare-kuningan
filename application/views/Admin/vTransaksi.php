<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-settings bg-blue"></i>
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
									<th scope="col">Tahun Kendaraan</th>
									<th scope="col">Jam Kedatangan</th>
									<th scope="col">Jenis Service</th>
									<th scope="col">Status Reservasi</th>
									<th scope="col">Konfirmasi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($transaksi['konfirmasi_admin'] as $key => $value) {
								?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $value->nama_pelanggan ?></td>
										<td><?= $value->plat_kendaraan ?></td>
										<td><?= $value->model_kendaraan ?></td>
										<td><?= $value->brand_kendaraan ?></td>
										<td><?= $value->tahun_kendaraan ?></td>
										<td><?= $value->jam_kedatangan ?></td>
										<td><?= $value->jenis_service ?></td>
										<td><span class="badge bg-danger">Konfirmasi Reservasi</span></td>

										<td class="text-center">
											<div class="table-actions">
												<a href="<?= base_url('Admin/cTransaksi/konfirmasi/' . $value->id_reservasi) ?>"><i class="ik ik-check-circle"></i></a>
												<a data-toggle="modal" data-target="#demoModal<?= $value->id_reservasi ?>"><i class="ik ik-refresh-cw"></i></a>
												<a href="<?= base_url('Admin/cTransaksi/batalkan/' . $value->id_reservasi) ?>"><i class="ik ik-x-square"></i></a>
											</div>
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
foreach ($transaksi['konfirmasi_admin'] as $key => $value) {
?>
	<div class="modal fade" id="demoModal<?= $value->id_reservasi ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form action="<?= base_url('Admin/cTransaksi/update_jam/' . $value->id_reservasi) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="demoModalLabel">Perbaharui Jam Kedatangan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<input type="time" min="09:00" max="18:00" class="form-control" value="<?= $value->jam_kedatangan ?>" name="jam">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}
?>