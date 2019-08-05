    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <div id="infoMessage">
                    <?php echo $message; ?>
                </div>
                <?php echo form_open("admin/Auth/login", array(
                    "role" => "form",
                    'class' => 'login100-form validate-form'
                )); ?>
                <span class="login100-form-title p-b-55">
                    Login
                </span>
                <p><?php echo $this->session->flashdata('msg'); ?></p>
                <?php
                $attributes = array(
                    'class' => 'input100'
                ); ?>
                <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                    <?php echo form_input($identity, $attributes); ?>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <span class="lnr lnr-user"></span>
                    </span>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                    <?php echo form_input($password); ?>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <span class="lnr lnr-lock"></span>
                    </span>
                </div>


                <div class="container-login100-form-btn p-t-25">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

    </body>

    </html>