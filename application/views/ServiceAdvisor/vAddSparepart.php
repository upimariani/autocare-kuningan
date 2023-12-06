<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-moon bg-blue"></i>
						<div class="d-inline">
							<h5>Data Sparepart Service</h5>
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
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<h3>Tambah Data Sparepart</h3>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart('ServiceAdvisor/cTransaksi/add_to_cart/' . $id_reservasi); ?>
						<div class="form-group">
							<label for="input-1">Nama Sparepart</label>
							<select name="sparepart" id="sparepart" class="form-control" required>
								<option value="">---Pilih Sparepart---</option>
								<?php
								foreach ($sparepart as $key => $value) {
								?>
									<option data-nama="<?= $value->nama_sparepart ?>" data-harga="<?= $value->harga ?>" data-stok="<?= $value->stok ?>" value="<?= $value->id_sparepart ?>"><?= $value->nama_sparepart ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="input-2">Nama Sparepart</label>
							<input type="text" name="nama" class="nama form-control" id="input-2" readonly>
						</div>
						<div class="form-group">
							<label for="input-3">Harga</label>
							<input type="text" name="harga" class="harga form-control" id="input-3" readonly>
						</div>
						<div class="form-group">
							<label for="input-4">Stok</label>
							<input type="number" name="stok" class="stok form-control" id="input-4" readonly>
						</div>
						<div class="form-group">
							<label for="input-5">Quantity</label>
							<input type="number" name="qty" class="form-control" id="input-5" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success px-5"><i class="ik ik-moon"></i> Save</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<?php
				$qty = 0;
				foreach ($this->cart->contents() as $key => $value) {
					$qty += $value['qty'];
				}
				if ($qty != '0') {
				?>

					<div class="card">
						<div class="card-header d-block">
							<h3>Keranjang Sparepart <span class="badge bg-success"><?= $qty ?></span></h3>
							<span>Informasi keranjang sparepart service</span>
						</div>
						<div class="card-body p-0 table-border-style">
							<div class="table-responsive">
								<form action="<?= base_url('ServiceAdvisor/cTransaksi/selesai/' . $id_reservasi) ?>" method="POST">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Sparepart</th>
												<th>Harga</th>
												<th>Quantity</th>
												<th>Subtotal</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($this->cart->contents() as $key => $value) {
											?>
												<tr>
													<th scope="row"><?= $no++ ?></th>
													<td><?= $value['name'] ?></td>
													<td>Rp. <?= number_format($value['price'])  ?></td>
													<td><?= $value['qty'] ?></td>
													<td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
													<td><a href="<?= base_url('ServiceAdvisor/cTransaksi/delete/' . $value['rowid'] . '/' . $id_reservasi) ?>"><i class="ik ik-trash-2"></i></a></td>
												</tr>
											<?php
											}
											?>
											<tr>
												<td></td>
												<td>
													<h6>Tarif</h6>
												</td>
												<td colspan="3"><select class="form-control" id="tarif" name="tarif">
														<option>---Pilih Biaya Tarif---</option>
														<?php foreach ($tarif as $key => $value) {
														?>
															<option <?php if ($value->besar != '') {
																	?>data-view="Rp. <?= number_format($this->cart->total() + ($value->harga - ($value->harga * $value->besar / 100))) ?>" data-pembayaran="<?= $this->cart->total() + ($value->harga - ($value->harga * $value->besar / 100)) ?>" <?php
																																																																								} else {
																																																																									?> data-view="Rp. <?= number_format($this->cart->total() + $value->harga) ?>" data-pembayaran="<?= $this->cart->total() + $value->harga ?>" <?php
																																																																																																											} ?> value="<?= $value->id_tarif ?>"><?= $value->nama_service ?> | Harga. <?php if ($value->besar != '') {
																																																																																																																														?>
																	Rp. <?= number_format($value->harga - ($value->harga * $value->besar / 100)) ?>
																<?php
																																																																																																																														} else {
																?>
																	Rp. <?= number_format($value->harga) ?>
																<?php
																																																																																																																														} ?></option>
														<?php
														} ?>
													</select></td>
												<td></td>
											</tr>
										</tbody>
										<tfoot>

											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Sutotal: </td>
												<td><strong>Rp. <?= number_format($this->cart->total())  ?></strong></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total Pembayaran: </td>
												<td><strong class="view"></strong></td>
												<input type="hidden" class="pembayaran" name="pembayaran">
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td><button type="submit" class="btn btn-success">Selesai</button></td>
												<td></td>
											</tr>
										</tfoot>
									</table>
								</form>
							</div>
						</div>
					</div>
				<?php
				}

				?>
			</div>
		</div>


	</div>
</div>