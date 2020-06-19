<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="category"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="" data-parent="#category" href="#specs">
											<span class="badge pull-right"><i class="fa fa-minus"></i></span>
											Specifications
										</a>
									</h4>
								</div>
								<div id="specs" class="panel-collapse ">
									<div class="panel-body">
										<ul>
											<?php foreach ($cat as $c) :?>
											<li><a href="<?= base_url('homepage/category/').$c['category_id']?>"><?= $c['category_name']?></a></li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php foreach ($tot as $t): ?>
                                        <li><a href="<?= base_url('homepage/brand/').$t['vendor_id']?>"><?= $t['vendor_name']?><span class="pull-right">(<?= $t['total'] ?>)</span></a></li>
								<?php endforeach;?>
								</ul>
							</div>
						</div><!--/brands_products-->
						<!--price-range-->
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[150,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->
						<!-- /price-range -->
					
					</div>
				</div>