<!DOCTYPE html>
<html lang="en">

	<?php include('public_header.php');?>

		<!-- Hero-area -->
		<div class="hero-area section">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-about"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<?= heading('About Us',1,['class'=>'white-text']);?>
					</div>
				</div>
			</div>
		</div>
		<!-- /Hero-area -->

		<!-- About -->
		<div id="contact" class="section">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax" id="bg-about-main"></div>
			<!-- /Backgound Image -->
			<div class="container">
				<div class="row" style="color: black;">
					<div class="col-md-12">
						<?= heading('CodeHack',1,['class'=>'text-center', 'style' => 'color: black;']); ?>
					</div>
					
					<div class="text-center lead">
						<i><?= $about->aboutQuote; ?></i>
						<hr>
					</div>			
					
                    <div class="container section">
						<div class="col-md-6">
							<?php if( ! is_null($about->aboutImg )) : ?>
								<img src="<?= $about->aboutImg ?>" alt="" width="100%" height="100%" class="img-responsive">
							<?php endif; ?>
						</div>

						<div class="text-justify">
							<p class="lead"><?= $about->aboutContent; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /About -->

		<!-- Footer -->
		<?php include('public_footer.php');?>
		<!-- /Footer -->
</html>