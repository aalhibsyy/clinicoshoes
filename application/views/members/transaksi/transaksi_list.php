<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row" style="margin-bottom: 10px">

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
                            <th>No Transaksi</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead><?php
                            foreach ($status_data as $status) {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $status->id_transaksi ?></td>
                            <td><?php echo $status->id_pelanggan ?></td>
                            <td><?php echo $status->nama ?></td>
                            <td><?php echo $status->trans_status ?></td>
                            <td style="text-align:center">
                                <?php
                                echo anchor(site_url('admin/transaksi_status/update/' . $status->id_transaksi), 'Update', array('class' => 'btn btn-sm btn-primary btn-flat'));
                                echo ' | ';
                                echo anchor(site_url('admin/transaksi_status/delete/' . $status->id_transaksi), 'Hapus', 'onclick="javasciprt: return confirm(\'Yakin ingin menghapus ini ?\')"');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>