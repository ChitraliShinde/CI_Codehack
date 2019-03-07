		<footer id="footer" class="section white-text">
			<div class="container">

				<!-- Backgound Image -->
				<div class="bg-image bg-parallax overlay" id="bg-footer">
				</div>
				<!-- Backgound Image -->
			
				<div class="row">
					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<?= anchor('user', 'CodeHack',['class'=>'white-text','id'=>'logoname']); ?>
							<!-- <?= anchor('user', img(array('src'=>'assets/public/img/logo-alt.png','border'=>'0','alt'=>'CodeHack','class'=>'main-logo logo'))); ?> -->

						</div>
					</div>
					<!-- footer logo -->

					<!-- footer nav -->
					<div class="col-md-6">
						<ul class="footer-nav">
							<li><?= anchor('user', 'Home', ['class'=>'white-text']);?></li>
							<li><?= anchor('user/about', 'About', ['class'=>'white-text']);?></li>
							<li><?= anchor('user/trendingnow', 'Trending Now', ['class'=>'white-text']);?></li>
							<li><?= anchor('user/contact', 'Contact', ['class'=>'white-text']);?></li>
						</ul>
					</div>
					<!-- /footer nav -->
				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">
					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<ul class="footer-social">
							<li><a href="https://www.facebook.com/" class="facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/" class="twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://plus.google.com/" class="google-plus" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://www.instagram.com/" class="instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.youtube.com/" class="youtube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
							<li><a href="https://in.linkedin.com/" class="linkedin" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright <?= date('Y')?> All Rights Reserved. | Made With <i class="fa fa-heart-o" aria-hidden="true"></i> by CodeHack</span>
						</div>
					</div>
					<!-- /copyright -->
				</div>
				<!-- row -->
			</div>
		</footer>

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="<?= base_url('assets/public/js/jquery.min.js');?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/public/js/bootstrap.min.js');?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/public/js/main.js');?>"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

	</body>