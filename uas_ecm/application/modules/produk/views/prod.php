				<!--features_items-->
                <div class="col-sm-9 padding-right">
				<div class="features_items">
					<h2 class="title text-center">Products Catalog</h2>
					<?php
					if ($prod != null) {
					foreach ($prod as $p) { ?>
					<div id="search-results" class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img id="prod_img" src="<?= base_url('assets/img/products/').$p->product_image?>" alt="" />
									<?php echo "<h2> Rp. ".number_format($p->product_price,2,',','.')."</h2>"; ?>
									<p id="prodid"><a class="btn" href="<?= base_url('homepage/product/').$p->product_id?>"><?= $p->product_name;?></a></p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<!-- <div class="product-overlay">
									<div class="overlay-content">
										<?php echo "<h2> Rp. ".number_format($p->product_price,2,',','.')."</h2>"; ?>
										<p><?= $p->product_name;?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div> -->
							</div>
							<!-- <div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<?php }
					}?>
					
					</div><!--features_items-->
					<?php echo $pagination;?>
					<!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>