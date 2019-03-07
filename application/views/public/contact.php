<!DOCTYPE html>
<html lang="en">

	<?php include('public_header.php');?>

		<!-- Hero-area -->
		<div class="hero-area section">
			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" id="bg-contact"></div>
			<!-- /Backgound Image -->
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<?= heading('Get In Touch',1,['class'=>'white-text']);?>
					</div>
				</div>
			</div>
		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">
			<div class="container">
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">

							<?php if ( $feedback = $this->session->flashdata('feedback') ): 
                                $feedback_class = $this->session->flashdata('feedback_class');
                            ?>
                            <div class="row">
                                <div class='col-lg-8 col-lg-offset-1'>
                                    <div class="alert alert-dismissible <?= $feedback_class ?>">
                                        <?= $feedback; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

							<?= heading('Send Message',4) ?>
							<?php echo form_open('user/send_message'); ?>

								<?php echo form_label('Name:', 'uname',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'uname','placeholder'=>'Name','title'=>'Please Enter Your Name','value'=>set_value('uname'),'id'=>'uname','class'=>'form-control input','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('uname'); ?>
                                    <br>
                                </div>

                                <?php echo form_label('Email:', 'email',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'email','placeholder'=>'abc@gmail.com','title'=>'Please Enter Your Email Address','value'=>set_value('email'),'id'=>'email','class'=>'form-control input','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('email'); ?>
                                    <br>
                                </div>

                                <?php echo form_label('Contact No:', 'contactno',['class'=>'control-label']); ?>
                                <?php echo form_input(['name'=>'contactno','placeholder'=>'Contact Number','title'=>'Please Enter Your Contact Number','value'=>set_value('contactno'),'id'=>'contactno','class'=>'form-control input','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('contactno'); ?>
                                    <br>
                                </div>

                                <?php echo form_label('Message:', 'message',['class'=>'control-label']); ?>
                                <?php echo form_textarea(['name'=>'message','placeholder'=>'Enter Your Message','title'=>'Please Enter Your Message','value'=>set_value('message'),'id'=>'message','class'=>'form-control input','autocomplete'=>'off']); ?>
                                <div>
                                    <?php  echo form_error('message'); ?>
                                    <br>
                                </div>

								<?php echo form_submit('send','Send',['class'=>'main-button icon-button pull-right']); ?>
								<?php echo nbs(3); ?> 
								<?php echo form_reset('reset','Reset',['class'=>'main-button icon-button pull-right']); ?>
							<?php echo form_close(); ?>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Contact Information</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>codehack@gmail.com</li>
							<li><i class="fa fa-phone"></i>123-456-789-10</li>
							<li><i class="fa fa-map-marker"></i>4476 XYZ Street</li>
						</ul>

						<!-- contact map -->
						<div id="contact-map"></div>
						<!-- /contact map -->
					</div>
					<!-- contact information -->

				</div>
			</div>
		</div>
		<!-- /Contact -->

		<!-- Footer -->
		<?php include('public_footer.php');?>
		<!-- /Footer -->
</html>