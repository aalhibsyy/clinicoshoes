<!-- Begin Page Content -->
<div class="container-fluid">

    <h2 style="margin-top:0px"><?php echo $button ?> Pelanggan</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">ID Pelanggan <?php echo form_error('id_pelanggan') ?></label>
                    <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" placeholder="ID Pelanggan" value="<?php echo $id_pelanggan; ?>" readonly />
                </div>
                <div class="form-group">
                    <label for="varchar">Nama Pelanggan <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" value="<?php echo $nama; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="L" <?php if ($jenis_kelamin == 'L') {
                                                echo "Selected";
                                            } ?>>Laki-laki</option>
                        <option value="P" <?php if ($jenis_kelamin == 'P') {
                                                echo "Selected";
                                            } ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="varchar">No Telpon <?php echo form_error('telepon') ?></label>
                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Telpon" value="<?php echo $telepon; ?>" />
                </div>
                <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
</div>