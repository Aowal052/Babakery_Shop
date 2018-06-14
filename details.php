
<?php include 'design/start.php' ?>
<?php include 'design/header.php' ?>
<?php

    if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
        header('location:404.php');
    }else{
        $id = $_GET['proid'];
    }
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
     $quantity = $_POST['quantity'];
     $addCart = $ct->addCart($id,$quantity);
 }

?>


	<!---start-content-->
	<div class="details">
		<div class="container">
			<div class="row single">
				<div class="col-md-9">
					<div class="single_left">
					 <?php 
							$getpd=$pd->getSproduct($id);
							if ($getpd) {
								while ($result=$getpd->fetch_assoc()) {
									
					?>
						<div class="grid images_3_of_2">
							<ul id="etalage">
								<li>
									<a href="optionallink.php">
										<img class="etalage_thumb_image" src="admin/<?php echo $result['image']; ?>" class="img-responsive" />
										<img class="etalage_source_image" src="admin/<?php echo $result['image']; ?>" title="" />
									</a>
								</li>
							    
							</ul>
							 <div class="clearfix"></div>		
						</div>
						
					  	<div class="desc1 span_3_of_2">
							<h3><?php echo $result['product_name']; ?></h3>
							<p>Rs.<?php echo $result['price'];?></p>
							<div class="det_nav">
								<h4>related cakes :</h4>
								<?php 
								$flavour_id = $result['flavour_id'];
								$getck=$pd->relatedProduct($flavour_id);
								if ($getck) {
									while ($result=$getck->fetch_assoc()) {
								
								?>
								<ul>
									<li style="float: left;"><a href="details.php?proid=<?php echo $result['product_id'];?>"><img src="admin/<?php echo $result['image']; ?>" class="img-responsive" alt=""/></a></li>
								</ul>
								<?php } } ?>
							</div>
							<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
							</form>
							
							<a href="#"><span>login to save in wishlist </span></a>
				   	 	</div>
	          	    	<div class="clearfix"></div>
	          	   	</div>

	          	    <div class="single-bottom1">
						<h6>Details</h6>
						<p class="prod-desc"><?php echo $result['body'];?></p>
					</div>
					<?php } } ?>
					<div class="single-bottom2">
					<h6>Related Products</h6>
					<?php 
							$getNewPro = $pd->getNewPro();
							if ($getNewPro) {
								while ($result=$getNewPro->fetch_assoc()) {
							
						?>
						<div class="product">
						
						   <div class="product-desc">
								<div class="product-img">
					               <img src="admin/<?php echo $result['image']; ?>" class="img-responsive " alt=""/>
					           </div>
					           <div class="prod1-desc">
					               <h5><a class="product_link" href="">Excepteur sint</a></h5>
					               <p class="product_descr"><?php echo $fm->textShorten($result['body'], 50);?></p>									
							   </div>
							  <div class="clearfix"></div>
					      </div>
						  <div class="product_price">
								<span class="price-access">RS.<?php echo $result['price']; ?></span>						
								<div class="add-cart">
					<form action="" method="post">
						<!-- <input type="number" class="buyfield" name="quantity" value="1"/> -->
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style="color: red"><?php
					if (isset($addCart)) {
						echo $addCart;
					}
				?></span>
								
					      </div>
						 <div class="clearfix"></div>
					 </div>
					 <?php } } ?>
					</div>

	       		</div>

				<div class="col-md-3 single_left">
				   <div class="block block-layered-nav first">
	                  	<p class="block-subtitle">Shopping Options</p>
			            <dl id="narrow-by-list">
								<dt class="even">Items</dt>
							    
							    <dd class="even">
							    <?php
						$getAllCat = $cat->getAllCat();
						if ($getAllCat) {
							$i=1;
							while ($result= $getAllCat->fetch_assoc()) {
					
					?>
									<ol>
									    <li>
							              <a href="#"><?php echo $result['cat_name'];?></a>
							            </li>
									    
									</ol>
									<?php } } ?>
								</dd>
			                    
			                    <dt class="last odd">Flavours</dt>
			                    
			                    <dd class="last odd">
			                    <?php
									$getAllflavour = $flavour->getAllflavour();
									if ($getAllflavour) {
										$i=1;
										while ($result= $getAllflavour->fetch_assoc()) {
								
								?>
								<ol>
								    <li>
						                <a href="#"><?php echo $result['flavour_name'];?></a>
						            </li>
								</ol>
								<?php } } ?>
								</dd>
			            </dl>
	          
	        		</div>
				
		     
				  	<div class="tags">
						<h4 class="tag_head">Popular cakes</h4>
						<ul class="tags_links">
							<li><a href="#">FlowerAura</a></li>
							<li><a href="#">My Flower Tree</a></li>
							<li><a href="#">Butterscotch</a></li>
							<li><a href="#">Strawberry</a></li>
							<li><a href="#">Vennela</a></li>
							<li><a href="#">Blueberry</a></li>
							<li><a href="#">Chocolate</a></li>
							<li><a href="#">Pineapple</a></li>

						</ul>
						<a href="#" class="link1">View all tags</a>
					</div>
		   		</div>		   
				<div class="clearfix"></div>	
			</div>
		</div>
	</div>


<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>