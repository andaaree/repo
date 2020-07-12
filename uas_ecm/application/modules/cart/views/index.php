<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        <?php
                        if ($this->session->userdata('username') != null) {
                        foreach ($cart as $ct) {
                        ?>
						<tr>
							<td class="cart_product">
								<img width="110px" height="110px" src="<?= base_url('/assets/img/products/').$ct['product_image']?>" alt="">
							</td>
							<td class="cart_description">
								<h4><a href="<?= base_url('homepage/product/').$ct['product_id']?>"><?=$ct['product_name']?></a></h4>
							</td>
							<td class="cart_price">
								<p><?= "Rp. ".number_format($ct['product_price'],2,',','.')?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="<?=base_url('cart/add')?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?= $ct['quantity']?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="<?=base_url('cart/min')?>"> - </a>
								</div>
							</td>
							<td class="cart_total">
                                <?php $tot= $ct['product_price']*$ct['quantity'] ?>
								<p class="cart_total_price"><?= "Rp. ".number_format($tot,2,',','.')?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?=base_url('cart/delete')?>"><i class="fa fa-times"></i></a>
							</td>
                        <?php }?>
                        
                        </tr>
                        </tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
                        <?php } else {?>
                        <tr>
							<td class="cart_product">
								<a href=""><img src="" alt="">-</a>
							</td>
							<td class="cart_description">
								<h4><a href="">-</a></h4>
								<p>-</p>
							</td>
							<td class="cart_price">
								<p>-</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="0" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">-</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->