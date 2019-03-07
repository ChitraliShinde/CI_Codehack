<!DOCTYPE html>
<html lang="en">

	<?php include('public_header.php');?>
	
	<!-- Home -->
		<div id="home" class="hero-area">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-hero"></div>
			<!-- /Backgound Image -->
			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<?= heading('Your World!!!',1,['class'=>'white-text']); ?>
							<p class="lead white-text"><i>“Start where you are. Use what you have. Do what you can.”</i></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Home -->

		<!-- Courses -->
		<div id="courses" class="section">
			<div class="container">
				<div class="row">
					<div class="section-header text-center">
						<?= heading('Posts',2) ?>
					</div>
				</div>

				<!-- courses -->
				<div id="courses-wrapper">
					<div class="row">
						<?php foreach( $articles as $article ): ?>
						<!-- single course -->						
						<div class="col-md-3 col-sm-6 col-xs-6">							
							<div class="course">
				
								<?= anchor("user/show_one/{$article->id}", img(array('src'=>base_url()."uploads/{$article->image_path}" , 'alt'=> 'Image', 'height'=>'200','width'=>'250')),['class'=>'course-image']); ?>
								<?= br(2); ?>
									
								<?= anchor("user/show_one/{$article->id}", word_limiter($article->title, 3),['class'=>'course-title']); ?>

								<div class="course-details">
									<p class="text-justify"><?= character_limiter($article->description, 120); ?></p>
									<?= anchor("user/show_one/{$article->id}",'Details',['class'=>'main-button icon-button']) ?>
								</div>
							</div>							
						</div>
						<?php endforeach; ?>
						<!-- /single course -->						
					</div>
					<div class="text-center"><?= $this->pagination->create_links(); ?></div>
					
				</div>
				<!-- /courses -->
			</div>
			<!-- container -->
		</div>
		<!-- /Courses -->

		<div id="ctasection">
		<!-- Call To Action -->
		<div id="cta" class="section">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-quote"></div>
			<!-- /Backgound Image -->
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<p class="lead white-text text-center">
							<i>“Live as if you were to die tomorrow. Learn as if you were to live forever.”</i> 
						</p>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Call To Action -->
		</div>

			
		<!-- Courses -->
		<div id="courses" class="section">
			<div class="container">
				<div class="row">
					<div class="section-header text-center">
						<?= heading('Popular Post',2) ?>
					</div>
				</div>

				<!-- courses -->
				<div id="courses-wrapper">
					<div class="row">
						<?php foreach( $popular_articles as $article ): ?>
						<!-- single course -->						
						<div class="col-md-3 col-sm-6 col-xs-6">							
							<div class="course">
				
								<?= anchor("user/show_one/{$article->id}", img(array('src'=>base_url()."uploads/{$article->image_path}" , 'alt'=> 'Image', 'height'=>'200','width'=>'250')),['class'=>'course-image']); ?>
								<?= br(2); ?>
									
								<?= anchor("user/show_one/{$article->id}", word_limiter($article->title, 3),['class'=>'course-title']); ?>

								<div class="course-details">
									<p class="text-justify"><?= character_limiter($article->description, 120); ?></p>
									<?= anchor("user/show_one/{$article->id}",'Details',['class'=>'main-button icon-button']) ?>
								</div>
							</div>							
						</div>
						<?php endforeach; ?>
						<!-- /single course -->						
					</div>
					<div class="text-center"><?= $this->pagination->create_links(); ?></div>
					
				</div>
				<!-- /courses -->
			</div>
			<!-- container -->
		</div>
		<!-- /Courses -->

		<!-- Contact CTA -->
		<div id="contact-cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-cont"></div>
			<!-- Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-8 col-md-offset-2 text-center">
						<h2 class="white-text">Contact Us</h2>
						<p class="lead white-text">Earn your success based on service to others, not at the expense of others.</p>
						<?= anchor("user/contact",'Contact Us Now',['class'=>'main-button icon-button']); ?>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Contact CTA -->
	
		<!-- Footer -->

		<!-- Footer -->
		<?php include('public_footer.php');?>
</html>