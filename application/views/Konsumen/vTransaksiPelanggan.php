<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url('asset/carbook-master/') ?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Transaksi <i class="ion-ios-arrow-forward"></i></span></p>
				<h1 class="mb-3 bread">Transaksi Service</h1>
			</div>
		</div>
	</div>
</section>
<?php
if ($this->session->userdata('success')) {
?>
	<div class="alert alert-success" role="alert">
		<?= $this->session->userdata('success') ?>
	</div>
<?php
}
?>
<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="car-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th class="bg-primary heading">Total Pembayaran</th>
								<th class="bg-dark heading">Status Service</th>
								<th class="bg-black heading">Service</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($transaksi as $key => $value) {
							?>

								<tr class="">
									<td class="car-image">
										<h5><?= $value->plat_kendaraan ?></h5>
									</td>
									<td class="product-name">
										<h5><?= $value->brand_kendaraan ?> | <?= $value->model_kendaraan ?> <?= $value->tahun_kendaraan ?> </h5>

										<?php
										if ($value->stat_reservasi == '4') {
											$cek_data = $this->db->query("SELECT * FROM `ulasan` WHERE id_reservasi='" . $value->id_reservasi . "'")->row();
											if (!$cek_data) {
												if ($value->service_sesuai == '0') {
										?>
													<small>Apakah service sesuai dengan keinginan anda?</small><br>
													<a class="btn btn-success mr-2" href="<?= base_url('Konsumen/cTransaksi/sesuai/' . $value->id_reservasi) ?>">
														Sesuai?
													</a><a class="btn btn-danger" href="<?= base_url('Konsumen/cTransaksi/tidak_sesuai/' . $value->id_reservasi) ?>">
														Kurang Sesuai?
													</a>
												<?php
												} else {
												?>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $value->id_reservasi ?>">
														Penilaian
													</button>
												<?php
												}
												?>

											<?php
											} else {
											?>
												<span>rated:</span>
												<?php
												if ($cek_data->rating == '0') {
												?>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
												<?php
												} else if ($cek_data->rating == '1') {
												?>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
												<?php
												} else if ($cek_data->rating == '2') {
												?>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
												<?php
												} else if ($cek_data->rating == '3') {
												?>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
												<?php
												} else if ($cek_data->rating == '4') {
												?>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star"></span>
												<?php
												} else if ($cek_data->rating == '5') {
												?>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
													<span class="ion-ios-star checked"></span>
												<?php
												}
												?>
										<?php
											}
										}
										?>

									</td>

									<td class="price">
										<div class="price-rate">
											<h3>
												<span class="num"><small class="currency"></small>Rp. </span>
												<span class="per"><?= number_format($value->total_pembayaran) ?></span>
											</h3>
										</div>
									</td>

									<td class="price">

										<div class="price-rate">
											<?php
											if ($value->stat_reservasi == '0') {
											?>
												<span class="badge bg-danger">Menunggu Konfirmasi</span>
											<?php
											} else if ($value->stat_reservasi == '1') {
											?>
												<span class="badge bg-warning">Proses Sparepart</span>
											<?php
											} else if ($value->stat_reservasi == '2') {
											?>
												<span class="badge bg-info">Menunggu Konfirmasi Pembayaran <br>
													<?php
													if ($value->estimasi_service != NULL) {
													?>
														Estimasi Selesai: <?= $value->estimasi_service ?>
													<?php
													}
													?>

												</span>
												<?php
												if ($value->bukti_pembayaran == NULL) {
												?>
													<?php echo form_open_multipart('Konsumen/cTransaksi/bayar/' . $value->id_reservasi); ?>
													<label>Pembayaran</label>
													<small>Bank. BRI <br> No. Rek 32098823-02937-01 <br> A/n. AUTOCARE KUNINGAN</small>
													<input type="file" class="form-control" name="gambar">
													<button type="submit" class="btn btn-success mt-2">Kirim</button>
													</form>
												<?php
												}
												?>
											<?php
											} else if ($value->stat_reservasi == '3') {
											?>
												<span class="badge bg-warning">Proses Service</span>
												<?php
												if ($value->estimasi_service != NULL) {
												?>
													Estimasi Selesai: <?= $value->estimasi_service ?>
												<?php
												}
												?>
											<?php
											} else {
											?>
												<span class="badge bg-success">Selesai</span>

											<?php
											}
											?>
										</div>
									</td>
									<td class="price">
										<div class="price-rate">
											<?php
											//sparepart
											$sparepart = $this->db->query("SELECT * FROM `reservasi_service` JOIN data_reservasi ON reservasi_service.id_reservasi=data_reservasi.id_reservasi JOIN data_sparepart ON data_reservasi.id_sparepart=data_sparepart.id_sparepart WHERE reservasi_service.id_reservasi='" . $value->id_reservasi . "'")->result();
											foreach ($sparepart as $key => $item) {
											?>
												<span class="subheading"><?= $item->nama_sparepart ?></span><br>
											<?php
											}
											?>
										</div>
									</td>
								</tr><!-- END TR-->
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php
	foreach ($transaksi as $key => $value) {
	?>
		<div class="modal fade" id="exampleModal<?= $value->id_reservasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form action="<?= base_url('Konsumen/cTransaksi/ulasan/' . $value->id_reservasi) ?>" method="POST">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Masukkan Penilaian Service dan Pelayanan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div id='rate-0'>

								<input type='hidden' name='rating' id='rating' value="0">
								<?php echo "
                                                        <ul class='star' onMouseOut=\"resetRating('0')\">"; //untuk menampilan value dari bintang
								for ($i = 1; $i <= 5; $i++) {
									if ($i <= 0) {
										$selected = "selected";
									} else {
										$selected = "";
									}
									echo "<li class='select' class='$selected' onmouseover=\" highlightStar(this,0)\" onmouseout=\"removeHighlight(0);\" onClick=\"addRating(this,0)\">&#9733;</li>";
								}
								echo "<ul>
                                                    </div> "; ?>
								<textarea class="form-control" name="ulasan" placeholder="Tulis Ulasan Anda..." required></textarea>
							</div>


							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</section>
