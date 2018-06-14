	<!-- bottom-grids -->
	<style type="text/css">
	.bottom-grid{
			height: 80%;
			width: 100%;
		}
	</style>
		<div class="bottom-grids">
			<div class="container">
				<div class="col-md-12 bottom-grid-left">
				<?php
		    		$pd = new product;
		    		$fm = new Format;
		    		$getSpro = $pd->getNewPro();
		    		if ($getSpro) {
		    			while ($result = $getSpro->fetch_assoc()) {
			    	?>
					<div class="col-md-3 bottom-grid-left-grid text-center">
						<img src="admin/<?php echo $result['image'];?>" title="name" />
						<h4><?php echo $result['product_name'];?></h4>
						<p>$<?php echo $result['price'];?></p>
					</div>
					<?php } } ?>
					
					<div class="clearfix"> </div>
					<span class="best-sale">New Araival</span>
					<a href="details.php?proid=<?php echo $result['product_id'];?>" class="order"> </a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	<!-- bottom-grids -->