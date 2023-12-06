<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-percent bg-blue"></i>
						<div class="d-inline">
							<h5>Data Promo Tarif</h5>
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
							<li class="breadcrumb-item active" aria-current="page">Promo Tarif</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#demoModal"><i class="ik ik-percent"></i>Tambah Data Promo Tarif</button>
		<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="demoModalLabel">Masukkan Data Promo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="<?= base_url('Admin/cPromo/create') ?>" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label for="input-5">Nama Tarif</label>
								<select name="tarif" class="form-control" required>
									<option value="">---Pilih Level User---</option>
									<?php
									foreach ($tarif as $key => $value) {
									?>
										<option value="<?= $value->id_tarif ?>"><?= $value->nama_service ?></option>
									<?php
									}
									?>

								</select>
							</div>
							<div class="form-group">
								<label for="input-4">Nama Promo</label>
								<input type="text" name="nama" class="form-control" id="input-4" placeholder="Masukkan Nama Promo" required>
							</div>
							<div class="form-group">
								<label for="input-5">Besar Promo</label>
								<input type="text" name="besar" class="form-control" id="input-5" placeholder="Masukkan Besar Promo" required>
							</div>
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
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3>Informasi Promo Tarif Service</h3>

					</div>
					<div class="card-body">
						<table id="data_table" class="table">
							<thead>
								<tr>
									<th scope="col">#</th>

									<th scope="col">Nama Tarif</th>
									<th scope="col">Nama Promo</th>
									<th scope="col">Besar Promo</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($promo as $key => $value) {
								?>
									<tr>
										<th scope="row"><?= $no++ ?></th>

										<td><?= $value->nama_service ?></td>
										<td><?= $value->nama_promo ?></td>
										<td><?= $value->besar ?>%
										</td>
										<td class="text-center">
											<div class="table-actions">
												<button class="btn btn-light" type="button" data-toggle="modal" data-target="#edit<?= $value->id_promo  ?>"><i class="ik ik-edit-2"></i></button>
												<a href="<?= base_url('Admin/cPromo/delete/' . $value->id_promo) ?>"><i class="ik ik-trash-2"></i></a>
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
foreach ($promo as $key => $item) {
?>
	<div class="modal fade" id="edit<?= $item->id_promo  ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="demoModalLabel">Update Data Promo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form action="<?= base_url('Admin/cPromo/update/' . $item->id_promo) ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="input-5">Nama Tarif</label>
							<select name="tarif" class="form-control" required>
								<option value="">---Pilih Level User---</option>
								<?php
								foreach ($tarif as $key => $value) {
								?>
									<option value="<?= $value->id_tarif ?>" <?php if ($value->id_tarif == $item->id_tarif) {
																				echo 'selected';
																			} ?>><?= $value->nama_service ?></option>
								<?php
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="input-4">Nama Promo</label>
							<input type="text" value="<?= $item->nama_promo ?>" name="nama" class="form-control" id="input-4" placeholder="Masukkan Nama Promo" required>
						</div>
						<div class="form-group">
							<label for="input-5">Besar Promo</label>
							<input type="text" name="besar" value="<?= $item->besar ?>" class="form-control" id="input-5" placeholder="Masukkan Besar Promo" required>
						</div>
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