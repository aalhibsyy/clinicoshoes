			<?php if ($akses == 1) { ?>
				<!-- Content Row -->
				<div class="row">
					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Transaksi</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($jumlah_transaksi);
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-dollar fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Diproses</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($jumlah_proses);
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-refresh fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Selesai</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($jumlah_selesai)
																							?></div>

									</div>
									<div class="col-auto">
										<i class="fas fa-location-arrow fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Pending Requests Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($jumlah_pelanggan)
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-users fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ($akses == 2) { ?>
				<!-- Content Row -->

				<div class="row">

					<div class="col-lg-5 mb-4">
						<div class="card shadow mb-4">
							<div class="card-header bg-primary py-3">
								<h6 class="m-0 font-weight-bold text-white">Clinico Shoes</h6>
							</div>
							<div class="card-body">
								<div class="text-center">
									<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?php echo base_url() ?>/assets/img/logo.png" alt="">
								</div>
								<h6 class="text-center">
									Clinico Shoes
									</h5>
									<h6 class="text-center">

									</h6>
							</div>
						</div>

					</div>

					<div class="col-lg-7 mb-4">

						<div class="card shadow mb-4">
							<div class="card-header bg-success py-3">
								<h6 class="m-0 font-weight-bold text-white">Cara Pemesanan Jasa</h6>
							</div>
							<div class="card-body">
								<p class="text-justify">
									1. Pilih Menu Transaksi
									<br />
									2. Pilih Jasa Yang Ingin Digunakana.
									<br />
									3. Pilih Staff.
									<br />
									4. Isi Jenis Sepatu.
									<br />
									5. Isi Ukuran Sepatu.
									<br />
									6. Pilih Tombol Simpan Maka Transaksi Berhasil Disimpan.
									<br />
									7. Cetak Bukti Transaksi.
									<br />
									8. Setelah Berhasil Maka Bisa Cek di Status Transaksi.
									<br />
									<br />
									<br />

								</p>
							</div>
						</div>

					</div>
				</div>
				<!-- /.container-fluid -->
			<?php } ?>

			<?php if ($akses == 3) { ?>
				<!-- Content Row -->
				<div class="row">
					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Transaksi</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($staff_jumlah_transaksi);
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-dollar fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Menunggu Konfirmasi</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($staff_jumlah_proses);
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-refresh fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pesanan Sudah Dikirim</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($staff_jumlah_selesai)
																							?></div>

									</div>
									<div class="col-auto">
										<i class="fas fa-location-arrow fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Pending Requests Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($staff_jumlah_pelanggan)
																							?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-users fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>