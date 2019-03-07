<!doctype html>
<html class="no-js" lang="en">
    <?php include('header.php'); ?>
<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="login-bg" id="login">
        <div class="error-pagewrap">
            <div class="error-page-int">
            <div class="text-center m-b-md custom-login ">
                <div class="login-head">
                    <?= heading('REGISTRATION', 1);?>
                </div>
            </div>  
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <?php echo form_open('login/admin_registration', ['id'=>'loginForm']); ?>
                            <div class="form-group">
                                <?php echo form_label('Username', 'username',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'username','placeholder'=>'username','title'=>'Please Enter The Username','id'=>'username','class'=>'form-control','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('username'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Email Address', 'email',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'email','placeholder'=>'abc@gmail.com','title'=>'Please Enter The Email Address','id'=>'email','class'=>'form-control','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('email'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <?php echo form_label('Password','password',['class'=>'control-label']); ?>
                                <?php echo form_password(['title'=>'Please Enter The Password','placeholder'=>'Password','name'=>'password','id'=>'password','class'=>'form-control']); ?>
                                <div>
                                    <?php  echo form_error('password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Confirm Password','confirm_password',['class'=>'control-label']); ?>
                                <?php echo form_password(['title'=>'Please Enter The Confirm Password','placeholder'=>'Confirm Password','name'=>'confirm_password','id'=>'confirm_password','class'=>'form-control']); ?>
                                <div>
                                    <?php  echo form_error('confirm_password'); ?>
                                </div>
                            </div>
                            
                            <?php echo form_submit('register','Register',['class'=>'btn btn-success btn-block loginbtn']); ?>
                            <?= br(1)?>
                            <?php echo form_reset('reset','Reset',['class'=>'btn btn-success btn-block loginbtn']); ?>
                            <?= br(1);?>
                            <?php echo form_label('Already have an account?'); ?>
                            <?= anchor('login', 'Login', ['class'=>'btn btn-success btn-block loginbtn']); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            </div>   
        </div>
    </div>
    <?php include('admin_footer.php'); ?>
</body>
</html>