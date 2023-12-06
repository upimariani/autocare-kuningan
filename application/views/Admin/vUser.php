<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-user-plus bg-blue"></i>
						<div class="d-inline">
							<h5>Data User</h5>
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
							<li class="breadcrumb-item active" aria-current="page">User</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#demoModal"><i class="ik ik-user-plus"></i>Tambah Data User</button>
		<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="demoModalLabel">Masukkan Data User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form action="<?= base_url('Admin/cUser/create') ?>" method="POST">
						<div class="modal-body">

							<div class="form-group">
								<label for="input-4">Username</label>
								<input type="text" name="username" class="form-control" id="input-4" placeholder="Masukkan Username" required>

							</div>
							<div class="form-group">
								<label for="input-5">Password</label>
								<input type="text" name="password" class="form-control" id="input-5" placeholder="Masukkan Password" required>

							</div>
							<div class="form-group">
								<label for="input-5">Level User</label>
								<select name="level" class="form-control" required>
									<option value="">---Pilih Level User---</option>
									<option value="1">Admin</option>
									<option value="2">Service Advisor</option>
									<option value="3">Mekanik</option>
									<option value="4">Owner</option>
								</select>

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
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h3>Informasi User</h3>

					</div>
					<div class="card-body">
						<table id="data_table" class="table">
							<thead>
								<tr>
									<th scope="col">#</th>

									<th scope="col">Username</th>
									<th scope="col">Password</th>
									<th scope="col">Kategori User</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($user as $key => $value) {
								?>
									<tr>
										<th scope="row"><?= $no++ ?></th>

										<td><?= $value->username ?></td>
										<td><?= $value->password ?></td>
										<td><?php if ($value->kategori_user == '1') {
											?>
												<span class="badge badge-success">Admin</span>
											<?php
											} else if ($value->kategori_user == '2') {
											?>
												<span class="badge badge-warning">Service Advisor</span>
											<?php
											} else if ($value->kategori_user == '3') {
											?>
												<span class="badge badge-danger">Mekanik</span>
											<?php
											} else if ($value->kategori_user == '4') {
											?>
												<span class="badge badge-info">Owner</span>
											<?php
											}
											?>
										</td>
										<td class="text-center">
											<div class="table-actions">
												<button class="btn btn-light" type="button" data-toggle="modal" data-target="#edit<?= $value->id_user  ?>"><i class="ik ik-edit-2"></i></button>
												<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>"><i class="ik ik-trash-2"></i></a>
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
foreach ($user as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="demoModalLabel">Perbaharui Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<form action="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" method="POST">
					<div class="modal-body">

						<div class="form-group">
							<label for="input-4">Username</label>
							<input type="text" name="username" value="<?= $value->username ?>" class="form-control" id="input-4" placeholder="Masukkan Username" required>

						</div>
						<div class="form-group">
							<label for="input-5">Password</label>
							<input type="text" name="password" value="<?= $value->password ?>" class="form-control" id="input-5" placeholder="Masukkan Password" required>

						</div>
						<div class="form-group">
							<label for="input-5">Level User</label>
							<select name="level" class="form-control" required>
								<option value="">---Pilih Level User---</option>
								<option value="1" <?php if ($value->kategori_user == '1') {
														echo 'selected';
													} ?>>Admin</option>
								<option value="2" <?php if ($value->kategori_user == '2') {
														echo 'selected';
													} ?>>Service Advisor</option>
								<option value="3" <?php if ($value->kategori_user == '3') {
														echo 'selected';
													} ?>>Mekanik</option>
								<option value="4" <?php if ($value->kategori_user == '4') {
														echo 'selected';
													} ?>>Owner</option>
							</select>

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