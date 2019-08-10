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
			<a class="nav-link" href="<?php echo base_url() ?>admin/Auth">
				<i class="fas fa-fw fa-user"></i>
				<span>Pengelola Pengguna</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>laporan">
				<i class="fas fa-fw fa fa-bar-chart"></i>
				<span>Laporan</span></a>
		</li>
	<?php } ?>
	<?php if ($this->ion_auth->in_group('staff')) { ?>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() ?>staff/transaksi_status">
				<i class="fas fa-fw fa-money"></i>
				<span>Transaksi</span></a>
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
		<li class="nav-item">
			<a class="nav-link" href="javascript:;" onclick="jQuery('#modal-1').modal('show');">
				<i class="fas fa-fw fa-exclamation"></i>
				<span>Berikan Testimoni</span></a>
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


	<!-- Divider -->
	<hr class=" sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->


<!-- Modal 1 (Basic)-->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Berikan Penilaian Pada Kami</h4>
			</div>

			<form class="form-horizontal" method="post" action="<?php echo base_url() . 'members/transaksi/in_rating' ?>">
				<div class="modal-body">

					<div class="form-group">
						<label class="control-label col-xs-3">Testimoni</label>
						<div class="col-xs-12">
							<textarea class="form-control rounded-0" id="testimoni" name="testimoni" rows="3"></textarea>
							<input id="input-21b" id="rating" name="rating" value="" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg" required title="">
						</div>
					</div>


				</div>

				<div class="modal-footer">
					<button class="btn btn-info"><span class="fa fa-save"></span> Simpan</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
				</div>
			</form>
			<script>
				jQuery(document).ready(function() {
					$("#input-21f").rating({
						starCaptions: function(val) {
							if (val < 3) {
								return val;
							} else {
								return 'high';
							}
						},
						starCaptionClasses: function(val) {
							if (val < 3) {
								return 'label label-danger';
							} else {
								return 'label label-success';
							}
						},
						hoverOnClear: false
					});
					var $inp = $('#rating-input');

					$inp.rating({
						min: 0,
						max: 5,
						step: 1,
						size: 'lg',
						showClear: false
					});

					$('#btn-rating-input').on('click', function() {
						$inp.rating('refresh', {
							showClear: true,
							disabled: !$inp.attr('disabled')
						});
					});


					$('.btn-danger').on('click', function() {
						$("#kartik").rating('destroy');
					});

					$('.btn-success').on('click', function() {
						$("#kartik").rating('create');
					});

					$inp.on('rating.change', function() {
						alert($('#rating-input').val());
					});


					$('.rb-rating').rating({
						'showCaption': true,
						'stars': '3',
						'min': '0',
						'max': '3',
						'step': '1',
						'size': 'xs',
						'starCaptions': {
							0: 'status:nix',
							1: 'status:wackelt',
							2: 'status:geht',
							3: 'status:laeuft'
						}
					});
					$("#input-21c").rating({
						min: 0,
						max: 8,
						step: 0.5,
						size: "xl",
						stars: "8"
					});
				});
			</script>
		</div>
	</div>
</div>