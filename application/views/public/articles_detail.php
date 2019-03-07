<!DOCTYPE html>
<html lang="en">

	<?php include('public_header.php');?>
	
<script type='text/javascript'>
$(function () {
$("a.reply").click(function () {
var id = $(this).attr("id");
$("#parent_id").attr("value", id);
$("#name").focus();
});
});
</script>

	<!-- Home -->
		<div id="home" class="hero-area">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-hero"></div>
			<!-- /Backgound Image -->
			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<?= heading('Edusite Free Online Training Courses',1,['class'=>'white-text']); ?>
							<p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Home -->

		<!-- Courses -->
		<div id="courses" class="section">
			<div class="container">

				<!-- courses -->
				<div id="courses-wrapper">
					<div class="container">
                        <div class="row">
							<div class="col-lg-6">
                                <?= heading($article->title, 1); ?>
							</div>
						</div>
						<hr>

						<div class="row section">
							<div class="col-md-6" style="float: right;">
								<?php if( ! is_null($article->image_path)) : ?>
									<img src="<?php echo base_url(); ?>uploads/<?= $article->image_path ?>" alt="" width="500" height="300">
								<?php endif; ?>
							</div>

							<div class="description" class="text-justify">
								<p class="lead"><?= $article->description; ?></p>
							</div>
						</div>
                    </div>					
				<!-- /courses -->
			</div>
			<!-- container -->
		</div>
		<!-- /Courses -->

		<!-- comment -->		
		<style type='text/css'>
			a, a:visited {
				outline: none;
				color: #7d5f1e;
			}

			.clear {
				clear: both;
			}

			#wrapper {
				width: 480px;
				margin: 0 auto 0 4px;
				padding: 15px 0px;
			}

			.comment_box {
				padding: 5px;
				border: 2px solid #7d5f1e;
				margin-top: 15px;
				list-style: none;
			}

			.aut {
				font-weight: bold;
			}

			.timestamp {
				font-size: 85%;
				float: right;
			}

			#comment_body {
				display: block;
				width: 100%;
				height: 150px;
			}

			#error_msg {
				color: "block";
			}
		 </style> 

		<div class="container">

			<div class="contact-form">
				<?php echo $comments; ?>
				<h4>Total Comments : 
					<?php echo $count_comments ; ?>
						
				</h4>

				<!-- blog comments -->
						<div class="blog-comments">

							<!-- single comment -->
							<div class="media">
								<div class="media-left">
									<img src="./img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<h4 class="media-heading">John Doe</h4>
									<p>Cu his iudico appareat ullamcorper, at mea ignota nostrum. Nonumy argumentum id cum, eos adversarium contentiones id</p>
									<div class="date-reply"><span>Oct 18, 2017 - 4:00AM</span><a href="#" class="reply">Reply</a></div>
								</div>
							</div>
							<!-- /single comment -->

							<!-- blog reply form -->
							<h3>Leave Comment</h3>
				<div style="color:red;">
					<p class="notice error" id="error_msg"><?= $this->session->flashdata('error_msg') ?></p>
					<br/>
				</div>
				<?= form_open("user/add_comment/{$article->id}",['id'=>'comment_form']);?>
					<div class="form-group">
						<?= form_label('Name:', 'name'); ?>
						<?= form_input(['name'=>'comment_name','class'=>'form-control input name-input','id'=>'name','value'=>set_value("comment_name")]); ?>
					</div>

					<div class="form-group">
						<?= form_label('Email:', 'email'); ?>
						<?= form_input(['name'=>'comment_email','class'=>'form-control input email-input','id'=>'email','value'=>set_value("comment_email")]); ?>
					</div>
					
					<div class="form-group">
						<?= form_label('Comment:', 'comment'); ?>
						<?= form_textarea(['name'=>'comment_body','class'=>'form-control','id'=>'comment','value'=>set_value("comment_body")]); ?>
					</div>

					<?php echo form_input(['name'=>'parent_id', 'id'=>'parent_id', 'type'=>'hidden', 'value'=>'0'])?>
					<?php echo form_input(['name'=>'id', 'id'=>'parent_id', 'type'=>'hidden', 'value'=>set_value("id", $article->id)])?>
					
					<div id='submit_button'>
						<?php echo form_submit('submit','Add Comment',['class'=>'main-button icon-button']); ?>
					</div>
				<?= form_close(); ?>
				<?= br(2); ?>
							<!-- /blog reply form -->

						</div>
						<!-- /blog comments -->
			</div>
		</div>
		<!-- /.container -->

		<!-- /comment -->

		<!-- Footer -->
		<?php include('public_footer.php');?>
		<!-- Footer -->

</html>