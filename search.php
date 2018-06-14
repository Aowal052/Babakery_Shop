<?php include 'design/start.php' ?>
<?php include 'design/header.php' ?>
<?php  
	
	if (isset($_GET['src'])) {
		$get_string = $_GET['src'];
		$string = $pd->search_result($get_string);
	}
    

?>				
<div class="best-seller">
		<div class="container">
			
			<h2>All Products</h2><hr>
			
			<div class="row">
			<?php 
				if ($string) {
					while ($result=$string->fetch_assoc()) {
				
			?>
				<div class="col-md-3 biseller-column text-center">
					<img src="admin/<?php echo $result['image']; ?>" alt="">
					<div class="veiw-img-mark text-center">
						<a href="singlepage.php">Quick view</a>
					</div>
					<div class="biseller-name text-center">
						<h4><?php echo $result['product_name']; ?></h4>
						<p>Rs.<?php echo $result['price'];?></p>
					</div>
					<a href="singlepage.html">
						<button class="add2cart">
				    		<span><a href="details.php?proid=<?php echo $result['product_id'];?>">Add to cart</a> </span>
						</button>
					</a>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>


			
			<div class="clearfix"></div>




<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>