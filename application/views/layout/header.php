<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
	<meta charset="utf-8">
	<link href="<?= base_url('assets') ?>/images/logo_.png" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Website Noname">
	<meta name="keywords" content="Noname">
	<meta name="author" content="Admin">
	<title>ANASER BERDIKARI |
		<?= $title; ?>
	</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/app.css" />
	<script src="<?= base_url('assets') ?>/js/sweetalert2.all.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


	<!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
	<!-- BEGIN: Mobile Menu -->
	<div class="mobile-menu md:hidden">
		<div class="mobile-menu-bar">
			<a href="" class="flex mr-auto">
				<img alt="ANASER BERDIKARI" class="w-10" src="<?= base_url('assets') ?>/images/logo_.png">
			</a>
			<a href="javascript:;" id="mobile-menu-toggler" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
					class="w-8 h-8 text-white transform -rotate-90"></i> </a>
		</div>
		<div class="scrollable">
			<a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
					class="w-8 h-8 text-white transform -rotate-90"></i> </a>
			<ul class="scrollable__content py-2">
			<?php if ($this->session->userdata('user_role') == 'admin') { ?>

				<li>
					<a href="<?= base_url('dashboard') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="gauge"></i> </div>
						<div class="menu__title"> Dashboard</div>
					</a>
				</li>
				<?php } ?>
				<li>
					<a href="<?= base_url('product') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
						<div class="menu__title"> Daftar Product</div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('pengambilan') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="clipboard-list"></i> </div>
						<div class="menu__title"> Pengambilan </div>
					</a>
				</li>
				<?php if ($this->session->userdata('user_role') == 'admin') { ?>
					<li>
						<a href="<?= base_url('users') ?>" class="menu">
							<div class="menu__icon"> <i data-lucide="layout-grid"></i> </div>
							<div class="menu__title"> Users </div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('kategori') ?>" class="menu">
							<div class="menu__icon"> <i data-lucide="users"></i> </div>
							<div class="menu__title"> Kategori </div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('pendapatan') ?>" class="menu">
							<div class="menu__icon"> <i data-lucide="wallet"></i> </div>
							<div class="menu__title"> Pendapatan </div>
						</a>
					</li>
				<?php } ?>
				<li>
					<a href="<?= base_url('profile') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="user"></i> </div>
						<div class="menu__title"> Profile </div>
					</a>
				</li>
				<li>
					<a href="<?= base_url('auth/logout') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="power"></i> </div>
						<div class="menu__title"> Logout </div>
					</a>
				</li>
			</ul>
		</div>

	</div>
	<!-- END: Mobile Menu -->
	<div class="flex mt-[4.7rem] md:mt-0">
		<!-- BEGIN: Side Menu -->
		<nav class="side-nav">
			<a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
				<img alt="Midone - HTML Admin Template" class="w-10" src="<?= base_url('assets') ?>/images/logo_.png">
				<span class="hidden xl:block text-white text-sm font-bold ml-3"> ANASER BERDIKARI </span>
			</a>
			<div class="side-nav__devider my-6"></div>
			<ul>
			<?php if ($this->session->userdata('user_role') == 'admin') { ?>
				<li>
					<a href="<?= base_url('dashboard') ?>"
						class="side-menu <?php if ($title == 'Dashboard')
							echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="gauge"></i> </div>
							<div class="side-menu__title"> Dashboard </div>
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="<?= base_url('product') ?>"
						class="side-menu <?php if ($title == 'Daftar Produk')
							echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
							<div class="side-menu__title">Daftar Product </div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('pengambilan') ?>"
						class="side-menu <?php if ($title == 'Pengambilan')
							echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="clipboard-list"></i> </div>
							<div class="side-menu__title"> Pengambilan </div>
						</a>
					</li>
				<?php if ($this->session->userdata('user_role') == 'admin') { ?>
					<li>
						<a href="<?= base_url('kategori') ?>"
							class="side-menu <?php if ($title == 'Kategori')
								echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="layout-grid"></i> </div>
								<div class="side-menu__title"> Kategori </div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('users') ?>"
							class="side-menu <?php if ($title == 'Users')
								echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="users"></i> </div>
								<div class="side-menu__title"> Users </div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('pendapatan') ?>"
							class="side-menu <?php if ($title == 'Pendapatan')
								echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="wallet"></i> </div>
								<div class="side-menu__title"> Pendapatan </div>
							</a>
						</li>
				<?php } ?>
				<li>
					<a href="<?= base_url('profile') ?>"
						class="side-menu <?php if ($title == 'Profile')
							echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="user"></i> </div>
							<div class="side-menu__title"> Profile </div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('auth/logout') ?>" class="side-menu">
						<div class="side-menu__icon"> <i data-lucide="power"></i> </div>
						<div class="side-menu__title"> Logout </div>
					</a>
				</li>
			</ul>
		</nav>
		<!-- END: Side Menu -->
		<div class="content">
			<!-- BEGIN: Top Bar -->
			<div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
				<!-- BEGIN: Breadcrumb -->
				<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Application</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?= $title ?>
						</li>
					</ol>
				</nav>
				<!-- END: Breadcrumb -->
			</div>
			<!-- END: Top Bar -->
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
			<div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
