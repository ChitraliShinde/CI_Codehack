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
            <?php echo form_hidden('user_id',$this->session->userdata('user_id')); ?>
            <?php if ( $error = $this->session->flashdata('login_failed') ): ?>
                <div class="row">
                    <div>
                        <div class="alert alert-dismissible alert-danger">
                            <?= $error; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="text-center m-b-md custom-login">
                <div class="login-head">
                    <?= heading('LOGIN', 1);?>
                </div>
            </div>  
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <?php echo form_open('login/admin_login', ['id'=>'loginForm']); ?>
                            <div class="form-group">
                                <?php echo form_label('Username', 'username',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'username','placeholder'=>'username','title'=>'Please Enter Your Username','value'=>set_value('username'),'id'=>'username','class'=>'form-control']); ?>
                                <div>
                                    <?php  echo form_error('username'); ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <?php echo form_label('Password','password',['class'=>'control-label']); ?>
                                <?php echo form_password(['title'=>'Please Enter Your Password','placeholder'=>'Password','name'=>'password','id'=>'password','class'=>'form-control']); ?>
                                <div>
                                    <?php  echo form_error('password'); ?>
                                </div>
                            </div>
                            
                            <div class="checkbox login-checkbox">   
                                <?php echo form_checkbox(['class'=>'i-check']); ?>
                                <?php echo form_label('Remember Me'); ?>
                            </div>
                            <?php echo form_submit('name','Login',['class'=>'btn btn-success btn-block loginbtn']); ?>
                            <?= br(1);?>
                            <?php echo form_label('Not a Member?'); ?>
                            <?= anchor('login/admin_registration', 'Sign up', ['class'=>'btn btn-success btn-block loginbtn']); ?>

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