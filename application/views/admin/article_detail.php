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
                                <li class="active"><a href="#description">Article Detail</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                	<div class="row">
														<div class="col-lg-6">
                                                            <?= heading($article->title, 1); ?>
														</div>
													</div>
													<hr>
													<p>
														<?= $article->description; ?>
													</p>

                                                    <?php if( ! is_null($article->image_path )) : ?>
                                                        <img src="<?php echo base_url(); ?>uploads/<?= $article->image_path ?>" alt="" style="width: 300px">
                                                    <?php endif; ?>

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