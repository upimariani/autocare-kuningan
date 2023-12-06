<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Autocare <span>Kuningan</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<?php
					if ($this->session->userdata('id_konsumen') != '') {
					?>
						<li class="nav-item"><a href="#" class="nav-link">Selamat Datang,<strong> <?= $this->session->userdata('nama') ?> </strong></a></li>
						<li class="nav-item"><a href="<?= base_url('Konsumen/cHome') ?>" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="<?= base_url('Konsumen/cTransaksi') ?>" class="nav-link">Transaksi Service</a></li>
						<li class="nav-item"><a href="<?= base_url('Konsumen/cLogin/logout') ?>" class="nav-link">Logout</a></li>
					<?php
					}
					?>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->