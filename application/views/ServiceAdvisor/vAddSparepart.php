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
							<label for="input-2">Kategori Sparepart</label>
							<select class="form-control" name="kategori" id="kategori">
								<option value="">---Kategori Sparepart---</option>
								<option value="1">Oli</option>
								<option value="2">Ban</option>
								<option value="3">Aksesoris</option>
								<option value="4">Aki</option>
								<option value="5">Dll</option>
							</select>
						</div>
						<div class="form-group">
							<label for="input-1">Nama Sparepart</label>
							<select name="sparepart" id="sparepart" class="form-control" required>


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
<div class="card" hidden>
	<div class="card-header d-flex justify-content-between">
		<a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
		<span class="user-name">John Doe</span>
		<button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
	</div>
	<div class="card-body">
		<div class="widget-chat-activity flex-1">
			<div class="messages">
				<div class="message media reply">
					<figure class="user--online">
						<a href="#">
							<img src="../img/users/3.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>Epic Cheeseburgers come in all kind of styles.</p>
					</div>
				</div>
				<div class="message media">
					<figure class="user--online">
						<a href="#">
							<img src="../img/users/1.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>Cheeseburgers make your knees weak.</p>
					</div>
				</div>
				<div class="message media reply">
					<figure class="user--offline">
						<a href="#">
							<img src="../img/users/5.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>Cheeseburgers will never let you down.</p>
						<p>They'll also never run around or desert you.</p>
					</div>
				</div>
				<div class="message media">
					<figure class="user--online">
						<a href="#">
							<img src="../img/users/1.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>A great cheeseburger is a gastronomical event.</p>
					</div>
				</div>
				<div class="message media reply">
					<figure class="user--busy">
						<a href="#">
							<img src="../img/users/5.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
					</div>
				</div>
				<div class="message media">
					<figure class="user--online">
						<a href="#">
							<img src="../img/users/1.jpg" class="rounded-circle" alt="">
						</a>
					</figure>
					<div class="message-body media-body">
						<p>If you are a vegan, we are sorry for you loss.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form action="javascript:void(0)" class="card-footer" method="post">
		<div class="d-flex justify-content-end">
			<textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
			<button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
		</div>
	</form>
</div>

<footer class="footer">
	<div class="w-100 clearfix">
		<span class="text-center text-sm-left d-md-inline-block">AUTOCARE - KUNINGAN</span>
	</div>
</footer>
</div>
</div>




<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="quick-search">
				<div class="container">
					<div class="row">
						<div class="col-md-4 ml-auto mr-auto">
							<div class="input-wrap">
								<input type="text" id="quick-search" class="form-control" placeholder="Search..." />
								<i class="ik ik-search"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body d-flex align-items-center">
				<div class="container">
					<div class="apps-wrap">
						<div class="app-item">
							<a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
						</div>
						<div class="app-item">
							<a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
	window.jQuery || document.write('<script src="<?= base_url('asset/themekit-master/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>dist/js/theme.min.js"></script>
<script src="<?= base_url('asset/themekit-master/') ?>js/datatables.js"></script>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#kategori').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('ServiceAdvisor/cTransaksi/add_ajax_sparepart'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					html = '<option value="">---Pilih Sparepart---</option>';
					for (i = 0; i < data.length; i++) {
						html += '<option data-nama=' + data[i].nama_sparepart + ' data-harga=' + data[i].harga + ' data-stok=' + data[i].stok + ' value=' + data[i].id_sparepart + '>' + data[i].nama_sparepart + '</option>';
					}
					$('#sparepart').html(html);
				}
			});
			return false;
		});

	});
</script>

<script>
	console.log = function() {}
	$("#sparepart").on('change', function() {

		$(".nama ").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));


		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));
	});
</script>
<script>
	console.log = function() {}
	$("#tarif").on('change', function() {

		$(".pembayaran").html($(this).find(':selected').attr('data-pembayaran'));
		$(".pembayaran").val($(this).find(':selected').attr('data-pembayaran'));


		$(".view").html($(this).find(':selected').attr('data-view'));
		$(".view").val($(this).find(':selected').attr('data-view'));

	});
</script>
</body>

</html>