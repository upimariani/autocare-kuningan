<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-tag bg-blue"></i>
						<div class="d-inline">
							<h5>Data Sparepart</h5>
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
							<li class="breadcrumb-item active" aria-current="page">Sparepart</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#demoModal"><i class="ik ik-tag"></i>Tambah Data Sparepart</button>
		<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="demoModalLabel">Masukkan Data Sparepart</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<?php echo form_open_multipart('Admin/cSparepart/create'); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="input-4">Nama Sparepart</label>
							<input type="text" name="nama" class="form-control" id="input-4" placeholder="Masukkan Nama Service" required>
						</div>
						<div class="form-group">
							<label for="input-5">Satuan</label>
							<input type="text" name="satuan" class="form-control" id="input-5" placeholder="Masukkan Satuan" required>
						</div>
						<div class="form-group">
							<label for="input-5">Harga</label>
							<input type="number" name="harga" class="form-control" id="input-5" placeholder="Masukkan Harga" required>
						</div>
						<div class="form-group">
							<label for="input-5">Stok</label>
							<input type="number" name="stok" class="form-control" id="input-5" placeholder="Masukkan Stok" required>
						</div>
						<div class="form-group">
							<label for="input-5">Gambar</label>
							<input type="file" name="gambar" class="form-control" id="input-5" required>
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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3>Informasi Sparepart</h3>
					</div>
					<div class="card-body">
						<table id="data_table" class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Sparepart</th>
									<th scope="col">Gambar</th>
									<th scope="col">Satuan</th>
									<th scope="col">Harga</th>
									<th scope="col">Stok</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($sparepart as $key => $value) {
								?>
									<tr>
										<th scope="row"><?= $no++ ?>.</th>
										<td><?= $value->nama_sparepart ?></td>
										<td><img style="width: 150px;" src="<?= base_url('asset/foto-sparepart/' . $value->gambar) ?>"></td>
										<td><?= $value->satuan ?></td>
										<td>Rp. <?= number_format($value->harga) ?></td>
										<td><?= $value->stok ?></td>

										<td class="text-center">
											<div class="table-actions">
												<button class="btn btn-light" type="button" data-toggle="modal" data-target="#edit<?= $value->id_sparepart  ?>"><i class="ik ik-edit-2"></i></button>
												<a href="<?= base_url('Admin/cSparepart/delete/' . $value->id_sparepart) ?>"><i class="ik ik-trash-2"></i></a>
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
foreach ($sparepart as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_sparepart ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="demoModalLabel">Perbaharui Data Sparepart</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<?php echo form_open_multipart('Admin/cSparepart/update/' . $value->id_sparepart); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="input-4">Nama Sparepart</label>
						<input type="text" name="nama" value="<?= $value->nama_sparepart ?>" class="form-control" id="input-4" placeholder="Masukkan Nama Service" required>
					</div>
					<div class="form-group">
						<label for="input-5">Satuan</label>
						<input type="text" name="satuan" value="<?= $value->satuan ?>" class="form-control" id="input-5" placeholder="Masukkan Satuan" required>
					</div>
					<div class="form-group">
						<label for="input-5">Harga</label>
						<input type="number" name="harga" value="<?= $value->harga ?>" class="form-control" id="input-5" placeholder="Masukkan Harga" required>
					</div>
					<div class="form-group">
						<label for="input-5">Stok</label>
						<input type="number" name="stok" value="<?= $value->stok ?>" class="form-control" id="input-5" placeholder="Masukkan Stok" required>
					</div>
					<div class="form-group">
						<label for="input-5">Gambar</label><br>
						<img style="width: 150px;" src="<?= base_url('asset/foto-sparepart/' . $value->gambar) ?>">
						<input type="file" name="gambar" class="form-control" id="input-5">
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