<?php
	include_once('/../classes/product.php');
	include_once('/../helpers/Format.php');
?>

				<div class="top-grid-featured">
					<span>Featured</span>
				</div>
		<div class="top-grids">
			<div class="container">
					<?php
			    		$pd = new product;
			    		$fm = new Format;
			    		$getFpro = $pd->getFeaturPro();
			    		if ($getFpro) {
			    			while ($result = $getFpro->fetch_assoc()) {
			    	?>
				
				<div class="col-md-4 top-grid">
					<div class="top-grid-head">
						<h3><?php echo $result['product_name'];?></h3>
					</div>
					<div class="top-grid-info">
						<img height="400px" width="200px" src="admin/<?php echo $result['image'];?>" class="img-responsive" title="name"/>
						<p><?php echo $fm->textShorten($result['body'], 50);?></p>
						<span>$<?php echo $result['price'];?></span>
						<div class="clearfix"> </div>
						<a class="btn" href="details.php?proid=<?php echo $result['product_id'];?>">Buy Now</a>
					</div>
				</div>
				<?php } } ?>
				
			</div>
		</div>
		<!-- top-grids -->