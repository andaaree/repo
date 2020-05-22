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
						<h2>Email Verification Page</h2>
					<?php $this->session->flashdata('sukses');?>
            <?php echo form_open('register/verif');?>
              <input type="text" name="key"/>
              <p><?php echo form_error('key'); ?></p>
			  <input type="submit" name="submit" class="btn btn-info" value="Verify"/>
			<?= form_close();?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->