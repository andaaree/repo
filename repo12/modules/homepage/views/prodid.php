				<!--features_items-->
				<div class="col-sm-9 padding-right">
					<div class="features_items">
                        
                        <h2 class="title text-center">Product - Details</h2>
                        <?php foreach ($proddet as $p) { ?>
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?= base_url('assets/img/products/').$p['product_image']?>" alt="" />
                                            <?php echo "<h2> Rp. ".number_format($p['product_price'],2,',','.')."</h2>"; ?>
											<p><?= $p['product_name'];?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
                                                <?php echo "<h2> Rp. ".number_format($p['product_price'],2,',','.')."</h2>"; ?>
                                                <p><?= $p['product_name'];?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
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
                        
                        
					</div><!--features_items-->
					<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					<!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>