<div class="main-content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h3>Laporan Reservasi</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url('Owner/cLaporan/cetak') ?>" method="POST">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="input-1">Bulan</label>
										<select class="form-control" name="bulan" required>
											<option value="">---Pilih Bulan---</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="input-2">Tahun</label>
										<select class="form-control" name="tahun" required>
											<option value="">---Pilih Tahun---</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
										</select>
									</div>
								</div>
							</div>


							<button type="submit" class="btn btn-success"><i class="ik ik-eye"></i> Cetak Laporan</button>
						</form>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>