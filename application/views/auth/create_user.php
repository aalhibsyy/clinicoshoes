<!-- Begin Page Content -->
<div class="container-fluid justify-content-center align-items-centers">
  <div class="content">
    <div class="animated fadeIn">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9">
          <div class="card">
            <div class="card-header bg-warning text-white">
              <strong>
                <h4><?php echo lang('create_user_heading'); ?></h4>
              </strong>
            </div>
            <div class="card-body card-block">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                      <div class="panel-title text-center">
                        <h5><?php echo lang('create_user_subheading'); ?></h5>
                        <br />
                      </div>

                      <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                      </div>
                    </div>

                    <div class="panel-body">
                      <?= form_open('admin/auth/create_user', array('form' => 'form', 'class' => 'form-horizontal form-groups-bordered')); ?>

                      <div class="form-group form-inline justify-content-center">
                        <div class="col-sm-9">
                          <div id="infoMessage"><?php echo $message; ?></div>
                          <div class="input-group minimal">
                            <?php echo form_input($first_name); ?>
                            <span class="input-group-addon"><i class="entypo-user"></i></span>
                          </div>
                          <br>
                          <div class="input-group minimal">
                            <?php echo form_input($last_name); ?>
                            <span class="input-group-addon"><i class="entypo-user"></i></span>
                          </div>
                          <br>
                          <?php
                          if ($identity_column !== 'email') {
                            echo '<p>';
                            echo lang('create_user_identity_label', 'identity');
                            echo '<br />';
                            echo form_error('identity');
                            echo form_input($identity);
                            echo '</p>';
                          }
                          ?>
                          <div class="input-group minimal">
                            <?php echo form_input($email); ?>
                            <span class="input-group-addon"><i class="entypo-mail"></i></span>
                          </div>

                          <br />

                          <div class="input-group minimal">
                            <?php echo form_input($address); ?>
                            <span class="input-group-addon"><i class="entypo-user"></i></span>
                          </div>
                          <br>

                          <div class="input-group minimal">
                            <?php echo form_input($phone); ?>
                            <span class="input-group-addon"><i class="entypo-user"></i></span>
                          </div>
                          <br>

                          <div class="input-group minimal">
                            <?php echo form_input($password); ?>
                            <span class="input-group-addon"><i class="entypo-lock"></i></span>
                          </div>
                          <br>

                          <div class="input-group minimal">
                            <?php echo form_input($password_confirm); ?>
                            <span class="input-group-addon"><i class="entypo-lock"></i></span>
                          </div>

                          <div class="form-group form-inline justify-content-center">
                            <?php if ($this->ion_auth->is_admin()) : ?>
                              <h5><?php echo lang('edit_user_groups_heading'); ?> </h5>
                              <?php foreach ($groups as $group) : ?>
                                <label class="checkbox">
                                  <?php
                                  $gID = $group['id'];
                                  $checked = null;
                                  $item = null;

                                  ?>
                                  <div class="checkbox checkbox-replace">
                                    <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                    <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                  </div>
                                </label>
                                <br />
                              <?php endforeach ?>

                            <?php endif ?>
                          </div>


                        </div>
                      </div>
                      <div class="form-group form-inline justify-content-center">
                        <div class="row">
                          <button type="submit" name="submit" class="btn btn-primary">Buat Pengguna</button> &nbsp;
                          <?= anchor('admin/Auth', 'Batal', array('class' => 'btn btn-danger')) ?>
                        </div>
                      </div>

                      <?php echo form_close(); ?>

                    </div>

                  </div>