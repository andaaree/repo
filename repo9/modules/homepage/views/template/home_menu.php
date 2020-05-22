<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?= base_url('')?>" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= base_url('homepage')?>/products">Products</a></li>
										<li><a href="<?= base_url('')?>cart">Cart</a></li>
										<li><a href="<?= base_url('')?>checkout">Checkout</a></li>
                                    </ul>
								</li>
								<?php if ($this->uri->uri_string('') == 'homepage/product/') { ?>
								<li><a href="<?= base_url('homepage')?>/product">Product - Details</a></li>
								<?php } ?>
								<li><a href="<?= base_url('homepage')?>/products">Products</a></li>
								<li><a href="<?= base_url('homepage')?>/contact">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" name="search" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->