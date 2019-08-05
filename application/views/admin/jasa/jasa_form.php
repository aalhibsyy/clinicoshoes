<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h4><?php echo $button ?> Jasa</h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="<?php echo $action; ?>" method="post">
                                <div class="form-group">
                                    <label for="varchar">Nama Jasa :<?php echo form_error('nama_jasa') ?></label>
                                    <input type="text" class="form-control" name="nama_jasa" id="nama_jasa" placeholder="Nama Jasa" value="<?php echo $nama_jasa; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Harga :<?php echo form_error('harga') ?></label>
                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="varchar">Keterangan :<?php echo form_error('keterangan') ?></label>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                                </div>
                                <input type="hidden" name="id_jasa" value="<?php echo $id_jasa; ?>" />
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                <a href="<?php echo site_url('jasa') ?>" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>