<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('jasa/create'), 'Tambah Jasa', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Jasa</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>

                        </tr>
                    </thead><?php
                            foreach ($jasa_data as $jasa) {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $jasa->nama_jasa ?></td>
                            <td><?php echo $jasa->harga ?></td>
                            <td><?php echo $jasa->keterangan ?></td>
                            <td style="text-align:center">
                                <?php
                                echo anchor(site_url('admin/jasa/update/' . $jasa->id_jasa), 'Ubah', array('class' => 'btn btn-sm btn-primary btn-flat'));
                                echo ' | ';
                                echo anchor(site_url('admin/jasa/delete/' . $jasa->id_jasa), 'Hapus', 'onclick="javasciprt: return confirm(\'Yakin ingin menghapus ini ?\')"');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>