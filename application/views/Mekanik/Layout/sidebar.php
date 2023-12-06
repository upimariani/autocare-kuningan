<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<div class="wrapper">
		<header class="header-top" header-theme="light">
			<div class="container-fluid">
				<div class="d-flex justify-content-between">
					<div class="top-menu d-flex align-items-center">
						<button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
						<div class="header-search">
							<div class="input-group">
								<span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
							</div>
						</div>
						<button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
					</div>
					<div class="top-menu d-flex align-items-center">
						<button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success"></span></button>
					</div>
				</div>
			</div>
		</header>
		<div class="page-wrap">
			<div class="app-sidebar colored">
				<div class="sidebar-header">
					<a class="header-brand" href="index.html">
						<span class="text">Autocare Kuningan</span>
					</a>
				</div>
				<div class="sidebar-content">
					<div class="nav-container">
						<nav id="main-menu-navigation" class="navigation-main">

							<div class="nav-lavel">Service</div>
							<div class="nav-item <?php if ($this->uri->segment(1) == 'Mekanik' && $this->uri->segment(2) == 'cTransaksi') {
														echo 'active';
													}  ?>">
								<a href="<?= base_url('Mekanik/cTransaksi') ?>"><i class="ik ik-shopping-cart"></i><span>Transaksi</span> <span class="badge badge-warning"></span> </a>
							</div>
							<div class="nav-item">
								<a href="<?= base_url('cLogin/logout') ?>"><i class="ik ik-power"></i><span>LogOut</span></a>
							</div>
						</nav>
					</div>
				</div>
			</div>