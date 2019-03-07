<!doctype html>
<html class="no-js" lang="en">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
     <?php include('header.php'); ?>
    <!-- Start Left menu area -->
    <?php include('admin_sidebar.php'); ?>
    <!-- End Left menu area -->
    
    <!-- Start Welcome area -->
    <?php include('admin_header.php'); ?>
    
    <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Add Article</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                        <?php echo form_open_multipart('dashboard/store_article', ['class'=>'dropzone dropzone-custom needsclick add-professors','id'=>'demo1-upload']); ?>
                                                        <?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <?php echo form_label('Article Title', 'department',['class'=>'control-label']); ?>
                                                                    <?php echo form_input(['name'=>'title','placeholder'=>'Article Title','value'=>set_value('title'),'id'=>'username','class'=>'form-control']); ?>
                                                                    <div>
                                                                        <?php  echo form_error('title'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <?php echo form_label('Article Description', 'department',['class'=>'control-label']); ?>
                                                                   
                                                                    <textarea name="description"  class="ckeditor" placeholder="Article Description"><?php echo set_value('description') ?></textarea>
                                                                    <div>
                                                                        <?php  echo form_error('description'); ?>
                                                                    </div>
                                                                </div> 
                                                                <div class="form-group">
                                                                    <?php echo form_label('Select Image', 'userfile',['class'=>'control-label']); ?>
                                                                    <?php echo form_upload(['name'=>'userfile','class'=>'form-control','id'=>'exampleInputEmail1','aria-describedby'=>'emailHelp']); ?>
                                                                    <div>
                                                                        <?php echo form_error('userfile');  ?>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <?php echo form_reset('reset','Reset',['class'=>'btn btn-success loginbtn']); ?>
                                                                    <?php echo form_submit('submit','Submit',['class'=>'btn btn-success loginbtn']); ?>
                                                                </div>
                                                            </div>
                                                        <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer -->
    <?php  include('admin_footer.php'); ?> 
</body>                        
</html>