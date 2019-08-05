    <div class="tile-title tile-blue">
        <div class="icon">
            <h3>Login</h3>
        </div>
    </div>
    <div id="infoMessage">
        <?php echo $message; ?>
    </div>
    <?php echo form_open("admin/Auth/login", array("role" => "form")); ?>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="entypo-user"></i>
            </div>

            <?php echo form_input($identity); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="entypo-user"></i>
            </div>

            <?php echo form_input($password); ?>
        </div>
    </div>
    <div class="form-group pull-left">
        <div class="checkbox checkbox-replace">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
            <?php echo lang('login_remember_label', 'remember'); ?>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-info btn-block btn-login">
            <i class="entypo-login"></i>
            Masuk
        </button>
    </div>

    <?php echo form_close(); ?>
    <!-- <p><?php echo anchor('admin/Auth/forgot_password', lang('login_forgot_password')); ?></p> -->
    <div class="form-group">
        <a href="<?php echo base_url() ?>Auth/registrasi">
            <button class="btn btn-info btn-block btn-login">
                <i class="entypo-user"></i>
                Buat Akun
            </button>
        </a>
    </div>
    </div>

    </div>