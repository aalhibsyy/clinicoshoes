<?php $pag = $this->uri->segment(1); ?>
<?php $page = $this->uri->segment(2); ?>
<?php $pages = $this->uri->segment(3); ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
		<div class="sidebar-brand-icon">
			<img src="<?php echo base_url() ?>/assets/img/logo.png" width="50" height="50" alt="">
		</div>
		<div class="sidebar-brand-text mx-3">Clinico<sup>Shoes</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url() ?>admin">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Beranda</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>
	<!-- Nav Item - Dashboard 
	<li class="nav-item">
		<a class="nav-link" href="<?php echo base_url() ?>pelanggan">
			<i class="fas fa-fw fa-users"></i>
			<span>Pelanggan</span></a>
	</li>
	-->
	<?php if ($this->ion_auth->in_group('admin')) { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>transaksi">
				<i class="fas fa-fw fa-money"></i>
				<span>Transaksi</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>transaksi_status">
				<i class="fas fa-location-arrow"></i>
				<span>Status Transaksi</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>jasa">
				<i class="fas fa-fw fa-book"></i>
				<span>Jasa</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>laporan">
				<i class="fas fa-fw fa fa-bar-chart"></i>
				<span>Laporan</span></a>
		</li>


		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>admin/Auth">
				<i class="fas fa-fw fa-user"></i>
				<span>Pengelola Pengguna</span></a>
		</li>
	<?php } ?>
	<?php if ($this->ion_auth->in_group('staff')) { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>staff/transaksi_status">
				<i class="fas fa-fw fa-money"></i>
				<span>Transaksi</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>staff/transaksi_status">
				<i class="fas fa-location-arrow"></i>
				<span>Status Transaksi</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>staff/laporan">
				<i class="fas fa-fw fa fa-bar-chart"></i>
				<span>Laporan</span></a>
		</li>

	<?php } ?>
	<?php if ($this->ion_auth->in_group('members')) { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>members/transaksi">
				<i class="fas fa-fw fa-money"></i>
				<span>Transaksi</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>members/transaksi_status">
				<i class="fas fa-location-arrow"></i>
				<span>Status Transaksi</span></a>
		</li>

	<?php } ?>


	<!-- Nav Item - Utilities Collapse Menu 
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa fa-cogs"></i>
			<span>Pengaturan</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Pengaturan:</h6>
				<a class="collapse-item" href="<?php echo base_url() ?>admin/Auth">Pengelola Pengguna</a>
			</div>
		</div>
	</li>
	-->

	<!-- Nav Item - Dashboard -->
	<!--
	<li class="nav-item">
		<a class="nav-link" href="javascript:;" onclick="jQuery('#modal-1').modal('show');">
			<i class="fas fa-fw fa-exclamation"></i>
			<span>Tentang</span></a>
	</li>-->

	<!-- End Add Menu -->

	<!-- Divider -->
	<hr class=" sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->


<!-- Modal 1 (Basic)-->
<div class="modal fade" id="modal-1">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Tentang Website</h4>
			</div>

			<div class="modal-body">
				<strong>Tentang Website</strong><br>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>