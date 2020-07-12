<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
                        <h2>Login as member here!</h2>
                        <a class="btn btn-info" href="<?= base_url('login')?>">Login</a>
                    </div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<?= $this->session->flashdata('sukses');?>
            <?php echo form_open('register');?>
              <input type="hidden" name="usid" value="UID<?php echo sprintf( "%04s",$users_id) ; ?>"/>
			  <p><?php echo form_error('usid'); ?></p>
			  <input type="hidden" name="token" value="<?php echo rand(1000,5000); ?>"/>
              <input type="text" name="username" placeholder="Username"/>
              <p><?php echo form_error('username'); ?>
              <input type="email" name="email" placeholder="Email Address"/>
              <p><?php echo form_error('email'); ?></p>
              <input type="password" name="password" placeholder="Password"/>
              <p><?php echo form_error('password'); ?></p>
			  <input type="password" name="password_conf" placeholder="Repeat Password"/>
              <p><?php echo form_error('password_conf'); ?></p>
							<input type="submit" class="btn btn-info" value="Signup"/>
			<?php form_close();?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
