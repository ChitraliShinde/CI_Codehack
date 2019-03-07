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

    <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <?= form_open('dashboard/search',['class'=>'sr-input-func','role'=>'search']); ?>
                                    <?php echo form_input(['name'=>'query','placeholder'=>'Search...','class'=>'search-int form-control']); ?>
                                    <a><button type="submit" class="fa fa-search" id="searchbtn"></button></a> 
                                </div>
                                    <?= form_error('query',"<p class='navbar-text text-danger'>",'</p>'); ?>
                                    <?= form_close(); ?>
                            </div> 
                            <div class="add-product">
                                <?= anchor('dashboard/store_article','Add Article',['class'=>'btn btn-lg btn-primary']); ?>
                            </div>
                        </div>
                        <div class="product-status-wrap">
                            <?php if ( $feedback = $this->session->flashdata('feedback') ): 
                                $feedback_class = $this->session->flashdata('feedback_class');
                            ?>
                            <div class="row">
                                <div class='col-lg-6 col-lg-offset-3'>
                                    <div class="alert alert-dismissible <?= $feedback_class ?>">
                                        <?= $feedback; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?= heading('View Articles', 4); ?>                            
                            <div class="asset-inner">
                                <table>
                                    <thead>
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if ( count($articles) ) : ?>
                                            <?php $count = $this->uri->segment(3,0); ?>
                                            <?php foreach( $articles as $article ): ?>
                                            <td style="width: 10%"><?= ++$count; ?></td>
                                            <td style="width: 20%"><?= anchor("dashboard/article/{$article->id}", word_limiter($article->title, 2)); ?></td>
                                            <td style="width: 30%"><?=  anchor("dashboard/article/{$article->id}", word_limiter($article->description, 3)); ?></td>
                                            <td style="width: 50%">
                                                <div>
                                                    <div class="col-lg-2">
                                                        <?= anchor("dashboard/edit_article/{$article->id}", 'Edit', ['value'=>'Edit','class'=>'btn btn-primary','data-toggle'=>'tooltip','title'=>'Edit','aria-hidden'=>'true'] ); ?>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <?= form_open('dashboard/delete_article'),
                                                        form_hidden('article_id',$article->id), 
                                                        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger','data-toggle'=>'tooltip','title'=>'Delete','aria-hidden'=>'true'] ), 
                                                        form_close();
                                                        ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php   endforeach; ?>
                                    <?php   else: ?>
                                        <tr>
                                            <td colspan="3"> No Record Found. </td>
                                        </tr>
                                    <?php   endif?>
                                    </tbody>
                                </table>
                            </div>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer -->
    <?php  include('admin_footer.php'); ?> 
</body>                        
</html>
