				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        <?php 
                         
                            foreach ($feat as $f) {
                            ?>
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url('assets/img/products/').$f['product_image']?>" alt="" />
                                            <?php echo "<h2> Rp. ".number_format($f['product_price'],2,',','.')."</h2>"; ?>
											<p><a href="<?= base_url('homepage/product/').$f['product_id']?>"><?= $f['product_name'];?></a></p>
											<form action="<?= base_url('')?>cart/add" method="POST">
												<input type="button" class="btn btn-default add-to-cart" value="Add to cart"/>
											</form>
											
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
                                                <?php echo "<h2> Rp. ".number_format($f['product_price'],2,',','.')."</h2>"; ?>
                                                <p><?= $f['product_name'];?></p>
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
                        <?php    
                        }    
                             0 ?>
						<div class="col-sm-4">
						<a class="btn btn-default add-to-cart" href="<?= base_url('homepage/products')?>">View More</a>
						
						</div>
					</div><!--features_items-->
					
					<div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
                                <?php
                                $i = 0;
                                foreach ($latest as $l):?>
                                    <?php
								if ($l['tanggal'] >= $lastmonth) {?>
								<?php if( ( ($i)< 3) && (($i+1) < 3)&& (($i+2) < 3) ){$crs = 'item active';}else{$crs = 'item';}?>
								<div class="<?= $crs?>">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
                                                <img src="<?= base_url('assets/img/products/').$l['product_image']?>"  alt="" />
												<?php echo "<h2> Rp. ".number_format($l['product_price'],2,',','.')."</h2>"; ?>
													<p><?= $l['product_name'];?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } $i++; endforeach; ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>