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
                            <th>Nama Pelanggan</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <?php if ($flag == 1 or $flag == 2) { ?>
                                <th>Aksi</th>
                            <?php } ?>

                        </tr>
                    </thead><?php
                            foreach ($status_data as $status) {
                                ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td style="text-align:center"><?php echo $status->id_transaksi ?></td>
                            <td style="text-align:center"><?php echo $status->first_name;
                                                            echo " $status->last_name" ?></td>
                            <td style="text-align:center"><?php echo $status->phone ?></td>
                            <td style="text-align:center"><?php echo $status->trans_status ?></td>
                            <?php if ($flag == 1 or $flag == 2) { ?>
                                <td style="text-align:center">
                                    <?php
                                    if ($flag == 1) {
                                        echo anchor(site_url('admin/transaksi_status/update/' . $status->id_transaksi), 'Update', array('class' => 'btn btn-sm btn-primary btn-flat'));
                                        echo ' | ';
                                        echo anchor(site_url('admin/transaksi_status/delete/' . $status->id_transaksi), 'Hapus', 'onclick="javasciprt: return confirm(\'Yakin ingin menghapus ini ?\')"');
                                    } else if ($flag == 2) {
                                        echo anchor(site_url('staff/transaksi_status/update/' . $status->id_transaksi), 'Update', array('class' => 'btn btn-sm btn-primary btn-flat'));
                                        echo ' | ';
                                        echo anchor(site_url('staff/transaksi_status/delete/' . $status->id_transaksi), 'Hapus', 'onclick="javasciprt: return confirm(\'Yakin ingin menghapus ini ?\')"');
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>