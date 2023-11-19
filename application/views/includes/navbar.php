<!-- Begin page -->
<div id="d-flex justify-content-center layout-wrapper">

	<header id="page-topbar" style="background-color: #ff4040 !important;">
		<div class="navbar-header mb-10">
			<div class="d-flex">
				<!-- LOGO -->
				<div class="navbar-brand-box">
					<a href="index.html" class="logo logo-dark">
						<span class="logo-sm">
							<img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
						</span>
						<span class="logo-lg">
							<img src="<?= base_url() ?>/assets/images/logo-dark.png" alt="" height="20">
						</span>
					</a>

					<a href="index.html" class="logo logo-light">
						<span class="logo-sm">
							<img src="<?= base_url() ?>/assets/images/logo-sm.png" alt="" height="22">
						</span>
						<span class="logo-lg">
							<img src="<?= base_url() ?>/assets/images/logo-light.png" alt="" height="20">
						</span>
					</a>
				</div>

				<button type="button"
					class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
					data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
					<i class="fa fa-fw fa-bars"></i>
				</button>

			</div>

			<div class="d-flex">


				<div class="dropdown d-inline-block">
					<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						
						<span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?= $profile->email ?></span>
						<i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-end">
						<a class="dropdown-item" href="<?= base_url('logout') ?>"><i
								class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span
								class="align-middle">Sign out</span></a>
					</div>
				</div>

			</div>
		</div>
		<div class="container-fluid">
			<div class="topnav">

				<nav class="navbar navbar-light navbar-expand-lg topnav-menu">

					<div class="collapse navbar-collapse" id="topnav-menu-content">
						<ul class="navbar-nav">

							<li class="nav-item">
								<?php
									switch ($profile->role) {
										case 1:
											$url = 'gatekeeper';
											break;
											case 2:
												$url = 'pertashop';
												break;
										default:
										$url = 'admin';
											break;
									}
									?>
								<a class="nav-link" href="<?= base_url() . "/" . $url ?>">
									<i class="uil-home-alt me-2"></i> Dashboard
								</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
									<i class="uil-apps me-2"></i>Berita Acara <div class="arrow-down"></div>
								</a>
								<div class="dropdown-menu" aria-labelledby="topnav-pages">
									<?php if ( $profile->role < 2 ): 
										$prefix	= ($profile->role == 0) ? 'admin' : 'gatekeeper';
									?>
										<a href="<?= base_url($prefix .'/berita-acara') ?>"
											class="dropdown-item">Lihat Data</a>
										<a href="<?= base_url('gatekeeper/berita-acara/tambah') ?>"
											class="dropdown-item">Tambah Data</a>
									<?php endif ?>

									<?php if ( $profile->role == 2 ): ?>
										<a href="<?= base_url('pertashop/berita-acara/input-spbu') ?>"
											class="dropdown-item">Update Kapasitas</a>
									<?php endif ?>

								</div>
							</li>
							<?php if ( $profile->role == 0 ): ?>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
									<i class="uil-apps me-2"></i>Sample BBM <div class="arrow-down"></div>
								</a>
								<div class="dropdown-menu" aria-labelledby="topnav-pages">

									<a href="<?= base_url('admin/') ?>" class="dropdown-item">Lihat Data</a>
									<a href="<?= base_url('admin/') ?>" class="dropdown-item">Tambah Data</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('admin/user') ?>">
									<i class="fa fa-user me-2"></i> Manage User
								</a>
							</li>
							<?php endif ?>

						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="main-content">

		<div class="page-content">
			<div class="container-fluid">