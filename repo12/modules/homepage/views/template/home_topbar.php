<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="https://wa.me/12267782887?text=Hello%20Admin%20I%20wanna%20ask%20about%20yourtexthere."><i class="fa fa-phone"></i> +1 226 778 2887</a></li>
								<li><a href="mailto:yaelah001@gmail.com"><i class="fa fa-envelope"></i>admin@fmart.com</a></li>
							<?php if (($this->uri->uri_string() == 'login') || ($this->session->userdata('role') == (0 && 2))) {?>
								<li><a href="<?= base_url('')?>dashboard"><i class="fa fa-user"></i> Admin</a></li>
							<?php } ?>	
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="<?= base_url('')?>assets/img/bg/banner_2.png" width="65px" height="45px" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<?php if ($username == '') {?>
								<li><a href="<?= base_url('')?>login"><i class="fa fa-lock"></i> Login</a></li>
								<?php } else {?>
								<li><a href=""><i class="fa fa-user"></i> <?= $username?></a></li>
								<li><a href="<?= base_url('login')?>/logout"><i class="fa fa-lock"></i> Logout</a></li>
								<?php } ?>
								<li><a href="<?= base_url('homepage')?>/cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="<?= base_url('homepage')?>/order"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	