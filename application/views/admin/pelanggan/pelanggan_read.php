<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<h2 style="margin-top:0px">Pelanggan</h2>

			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<td width="150px">ID Pelanggan</td>
					<td><?php echo $id_pelanggan; ?></td>
				</tr>
				<tr>
					<td>Nama Anggota</td>
					<td><?php echo $nama; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td><?php echo $jenis_kelamin; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?php echo $alamat; ?></td>
				</tr>
				<tr>
					<td>No Telpon</td>
					<td><?php echo $telepon; ?></td>
				</tr>
			</table>
			<div class="text-right">
				<a href=" <?php echo site_url('pelanggan') ?>" class="btn btn-outline-danger">Kembali</a>
			</div>
		</div>
	</div>
</div>