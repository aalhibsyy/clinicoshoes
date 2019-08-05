<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h4><?php echo $button ?> Status Transaksi</h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">No Transaksi :<?php echo form_error('id_transaksi') ?></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="id_transaksi" id="id_transaksi" placeholder="Nama Jasa" value="<?php echo $id_transaksi; ?>" readonly />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">Nama Pelanggan :<?php echo form_error('nama') ?></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $nama; ?>" readonly />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">No Hp :<?php echo form_error('nama') ?></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo $phone; ?>" readonly />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">Status :<?php echo form_error('trans_status') ?></label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $trans_status; ?>" readonly />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">Ubah Status :</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <select name="up_status" class="form-control">
                                            <option value="Barang Diterima" <?php if ($trans_status == 'Barang Diterima') {
                                                                                echo "Selected";
                                                                            } ?>>Barang Diterima</option>
                                            <option value="Menunggu Antrian" <?php if ($trans_status == 'Menunggu Antrian') {
                                                                                    echo "Selected";
                                                                                } ?>>Menunggu Antrian</option>
                                            <option value="Proses Pencucian" <?php if ($trans_status == 'Proses Pencucian') {
                                                                                    echo "Selected";
                                                                                } ?>>Proses Pencucian</option>
                                            <option value="Proses Pengeringan" <?php if ($trans_status == 'Proses Pengeringan') {
                                                                                    echo "Selected";
                                                                                } ?>>Proses Pengeringan</option>
                                            <option value="Selesai Proses" <?php if ($trans_status == 'Selesai Proses') {
                                                                                echo "Selected";
                                                                            } ?>>Selesai Proses</option>
                                            <option value="Sudah Dikirim" <?php if ($trans_status == 'Sudah Dikirim') {
                                                                                echo "Selected";
                                                                            } ?>>Sudah Dikirim</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="varchar">Nota :</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input type="text" class="form-control" name="trans_nota" id="trans_nota" placeholder="No. Resi / Keterangan . . ." value="<?php echo $trans_nota; ?>" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('staff/transaksi_status') ?>" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>