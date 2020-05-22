<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
                        <?php // Cetak jika ada notifikasi
                            if($this->session->flashdata('sukses')){ echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>'; }?>
                        
                        <form class="user row" method="POST" action="<?= base_url('login'); ?>" enctype="multipart/form-data">
                            <input type="text" name="username" placeholder="Username" />
                            <p><?php echo form_error('username'); ?></p>
                            <input type="password" name="password" placeholder="Password" />
                            <p><?php echo form_error('password'); ?></p>
                            <input type="submit" name="btnSubmit" class="btn-info" value="login"/>
                        </form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
                    <div class="signup-form">
                        <h2>Register Here!</h2>
                        <a class="btn btn-info" href="<?= base_url('register')?>">Register</a>
                    </div>
				</div>
			</div>
		</div>
	</section><!--/form-->