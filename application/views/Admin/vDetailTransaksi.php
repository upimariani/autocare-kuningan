<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="invoice-title">
							<h4 class="float-end font-size-15">Invoice #<?= date('Ymd') ?><?= $detail['transaksi']->id_reservasi ?>
								<?php
								if ($detail['transaksi']->stat_reservasi != '4') {
								?>
									<span class="badge bg-warning font-size-12 ms-2">Sedang Proses</span>
								<?php
								} else {
								?>
									<span class="badge bg-success font-size-12 ms-2">Selesai</span>
								<?php
								}
								?>
							</h4>
							<div class="text-muted">
								<p class="mb-1">AUTOCARE - KUNINGAN</p>
							</div>
						</div>
						<hr class="my-4">
						<div class="row">
							<div class="col-sm-6">
								<div class="text-muted">
									<h5 class="font-size-16 mb-3">Billed To:</h5>
									<h5 class="font-size-15 mb-2"><?= $detail['transaksi']->nama_pelanggan ?></h5>
									<p class="mb-1"><?= $detail['transaksi']->alamat ?></p>
									<p><?= $detail['transaksi']->no_hp ?></p>
								</div>
							</div>
							<!-- end col -->
							<?php
							if ($detail['transaksi']->bukti_pembayaran != NULL) {
							?>
								<div class="col-sm-6">
									<div class="text-muted">
										<h5 class="font-size-16 mb-3">Bukti Pembayaran</h5>
										<img style="width: 250px;" src="<?= base_url('asset/pembayaran/' .  $detail['transaksi']->bukti_pembayaran) ?>">
									</div>
								</div>
							<?php
							}
							?>
							<!-- end col -->
						</div>
						<!-- end row -->
						<div class="py-2">
							<h5 class="font-size-15">Order Summary</h5>
							<div class="table-responsive">
								<table class="table align-middle table-nowrap table-centered mb-0">
									<thead>
										<tr>
											<th style="width: 70px;">No.</th>
											<th>Item</th>
											<th>Price</th>
											<th>Quantity</th>
											<th class="text-end" style="width: 120px;">Subtotal</th>
										</tr>
									</thead><!-- end thead -->
									<tbody>
										<?php
										$no = 1;
										foreach ($detail['sparepart'] as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td>
													<div>
														<h5 class="text-truncate font-size-14 mb-1"><?= $value->nama_sparepart ?></h5>
													</div>
												</td>
												<td>Rp. <?= number_format($value->harga) ?></td>
												<td><?= $value->qty ?></td>
												<td class="text-end">Rp. <?= number_format($value->harga * $value->qty) ?></td>
											</tr>
										<?php
										}
										?>
										<tr>
											<th scope="row" colspan="4" class="border-0 text-right">
												Tipe Service</th>
											<td class="border-0 text-end"><?= $detail['transaksi']->nama_service ?></td>
										</tr>
										<tr>
											<th scope="row" colspan="4" class="border-0 text-right">
												Tarif</th>
											<td class="border-0 text-end">Rp. <?= number_format($detail['transaksi']->harga) ?></td>
										</tr>
										<!-- end tr -->
										<tr>
											<th scope="row" colspan="4" class="border-0 text-right">Total</th>
											<td class="border-0 text-end">
												<p class="m-0 fw-semibold">Rp. <?= number_format($detail['transaksi']->total_pembayaran) ?></p>
											</td>
										</tr>
										<!-- end tr -->
									</tbody><!-- end tbody -->
								</table><!-- end table -->
							</div><!-- end table responsive -->
							<div class="d-print-none mt-4">
								<div class="float-end">
									<a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
									<?php
									if ($detail['transaksi']->stat_reservasi == '2') {
									?>
										<a class="btn btn-success me-1" href="<?= base_url('Admin/cPembayaran/konfirmasi/' . $value->id_reservasi) ?>"><i class="ik ik-check-circle"></i></a>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end col -->
		</div>
	</div>
</div>
