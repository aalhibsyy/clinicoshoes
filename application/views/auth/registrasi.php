<div class="tile-title tile-blue">
    <div class="icon">
        <h3>Buat Akun</h3>
    </div>
</div>
<div id="infoMessage">
    <?php echo $message; ?>
</div>
<form action="<?php echo site_url('Auth/prosesregistrasi'); ?>" method="post">
    <div class="form-group">
        <label for="nama">Nama</label>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nama Depan">
            </div>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nama Belakang">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="phone">No Tlp</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telpon">
    </div>
    <div class="form-group">
        <label for="phone">Alamat</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat">
    </div>
    <hr>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Daftar">
    </div>
</form>
<?php if ($message != null) : ?>
    <div class="alert alert-warning"><?php echo $message; ?></div>
<?php endif; ?>

</div>
</div>

</div>