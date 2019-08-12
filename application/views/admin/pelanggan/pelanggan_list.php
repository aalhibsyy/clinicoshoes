<!-- Begin Page Content -->
<div class="container-fluid">

    <h2 style="margin-top:0px">Daftar Pelanggan</h2>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('pelanggan/create'), 'Tambah', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Daftar Pelanggan</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Kelasmin</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody><?php
                            $no = 0;
                            foreach ($pelanggan_data as $pelanggan) {
                                ?>
                            <tr>
                                <td width="20px"><?php echo ++$no ?></td>
                                <td><?php echo $pelanggan->nama ?></td>
                                <td><?php echo $pelanggan->jenis_kelamin ?></td>
                                <td><?php echo $pelanggan->telepon ?></td>
                                <td><?php echo $pelanggan->alamat ?></td>
                                <td align="center">
                                    <?php
                                    echo anchor(site_url('admin/pelanggan/read/' . $pelanggan->id_pelanggan), 'Lihat', array('class' => 'btn btn-success btn-sm'));
                                    echo ' | ';
                                    echo anchor(site_url('admin/pelanggan/update/' . $pelanggan->id_pelanggan), 'Ubah', array('class' => 'btn btn-sm btn-warning btn-flat'));
                                    echo ' | ';
                                    echo anchor(site_url('admin/pelanggan/delete/' . $pelanggan->id_pelanggan), 'Hapus', 'onclick="javasciprt: return confirm(\'Yakin ingin hapus ?\')"');
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->