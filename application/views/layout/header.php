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
	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
	<style>
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
		.bg-red-500{
			background-color: #ef4444 !important;
		}
		.bg-yellow-500{
			background-color: #fde047 !important;
		}
		.bg-gray-600{
			background-color: #4b5563 !important;
		}
		.bg-gray-700{
			background-color: #3f3f46 !important;
		}
		.bg-gray-900{
			background-color: #171717 !important;
		}
	</style>

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
				<li>
					<a href="<?= base_url('bukukas') ?>" class="menu">
						<div class="menu__icon"> <i data-lucide="book"></i> </div>
						<div class="menu__title"> Buku Kas </div>
					</a>
				</li>
				<?php if ($this->session->userdata('user_role') == 'admin') { ?>
					<li>
						<a href="<?= base_url('bukukas/konter') ?>" class="menu">
							<div class="menu__icon"> <i data-lucide="album"></i> </div>
							<div class="menu__title"> Buku Kas konter</div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('pelanggan') ?>" class="menu">
							<div class="menu__icon"> <i data-lucide="inbox"></i> </div>
							<div class="menu__title"> Kontak Pelanggan</div>
						</a>
					</li>
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
						<a href="<?= base_url('dashboard') ?>" class="side-menu <?php if ($title == 'Dashboard')
							  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="gauge"></i> </div>
								<div class="side-menu__title"> Dashboard </div>
							</a>
						</li>
				<?php } ?>
				<li>
					<a href="<?= base_url('product') ?>" class="side-menu <?php if ($title == 'Daftar Produk')
						  echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
							<div class="side-menu__title">Daftar Product </div>
						</a>
					</li>
					<li>
						<a href="<?= base_url('pengambilan') ?>" class="side-menu <?php if ($title == 'Pengambilan')
							  echo ('side-menu--active') ?>">
							<div class="side-menu__icon"> <i data-lucide="clipboard-list"></i> </div>
							<div class="side-menu__title"> Pengambilan </div>
						</a>
					</li>
				<?php if ($this->session->userdata('user_role') != 'operator') { ?>
					<li>
							<a href="<?= base_url('jasa') ?>" class="side-menu <?php if ($title == 'Jasa')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="refresh-ccw"></i> </div>
								<div class="side-menu__title"> Jasa </div>
							</a>
						</li>
					<li>
						<a href="<?= base_url('bukukas') ?>" class="side-menu <?php if ($title == 'Buku Kas')
							  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="book"></i> </div>
								<div class="side-menu__title"> Buku Kas </div>
							</a>
						</li>
						
				<?php } ?>
				<?php if ($this->session->userdata('user_role') == 'admin') { ?>
					<li>
						<a href="<?= base_url('bukukas/konter') ?>" class="side-menu <?php if ($title == 'Buku Kas Konter')
							  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="album"></i> </div>
								<div class="side-menu__title"> Buku Kas Konter</div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('pelanggan') ?>" class="side-menu <?php if ($title == 'Kontak Pelanggan')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="inbox"></i> </div>
								<div class="side-menu__title"> Kontak Pelanggan</div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('kategori') ?>" class="side-menu <?php if ($title == 'Kategori')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="layout-grid"></i> </div>
								<div class="side-menu__title"> Kategori </div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('users') ?>" class="side-menu <?php if ($title == 'User Tuser')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="users"></i> </div>
								<div class="side-menu__title"> Tuser </div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('users/operator') ?>" class="side-menu <?php if ($title == 'User Operator')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
								<div class="side-menu__title"> Operator </div>
							</a>
						</li>
						<li>
							<a href="<?= base_url('pendapatan') ?>" class="side-menu <?php if ($title == 'Pendapatan')
								  echo ('side-menu--active') ?>">
								<div class="side-menu__icon"> <i data-lucide="wallet"></i> </div>
								<div class="side-menu__title"> Pendapatan </div>
							</a>
						</li>
				<?php } ?>
				<li>
					<a href="<?= base_url('profile') ?>" class="side-menu <?php if ($title == 'Profile')
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
