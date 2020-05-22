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
						<h2><?php echo $message ?></h2>
						<a class="btn btn-info" href="<?= base_url('register/verif')?>">Verify</a>
						<input type="submit" value="" />
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->