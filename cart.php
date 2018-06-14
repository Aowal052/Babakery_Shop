<?php include 'design/start.php'; ?>
<?php include 'design/header.php';?>
<?php
	if (isset($_GET['cart_id'])) {
		$cart_id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['cart_id']);
		$delcartbyid = $ct->delcartbyid($cart_id);
	}
?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
		$cart_id = $_POST['cart_id'];
    	$quantity = $_POST['quantity'];
        $updateCart = $ct->updateCartQuantity($cart_id,$quantity);
        if ($quantity<=0) {
        	$delcartbyid = $ct->delcartbyid($cart_id);
        }
    }

?>
 <?php 
	 if (!isset($_GET['id'])) {
	 	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>
 <div class="main container">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="table">
							<tr width="100%">
								<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$getPro = $ct->getCartPro(); 
								if ($getPro) {
									$i 	 = 0;
									$sum = 0;
									$qty = 0;
									while ($result=$getPro->fetch_assoc()) {
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['product_name'];?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="img" style="height: 60px;width: 60px;"/></td>
								<td><?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $result['cart_id']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>" style="width: 40%; float: left;"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php echo $total = $result['price']*$result['quantity']; ?></td>
								<td><a onclick="return confirm('are you sure')" href="?cart_id=<?php echo $result['cart_id'];?>">X</a></td>
							</tr>
							<?php 
								$qty = $qty + $result['quantity'];
								$sum = $sum + $total;
								Session::set("qty",$qty);
								Session::set("sum",$sum);
							 ?>
							<?php } } ?>
						</table>
						<div style="height: 60px; width:100%;"></div>
						<?php 
							$getdata = $ct->checkCartTable();
							if ($getdata) {
						?>
						<table class="table" style="width: 30%; float: right;">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>15%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
									$vat = $sum * 0.15;
									$gtotal = $sum + $vat;
									echo $gtotal;
								?></td>
							</tr>
					   </table>
					   <?php }else{
					   	header("Location:index.php");
					   	} ?>
						
					 <div class="shopping">
						<div class="shopleft" style="float: left; bottom:20%;">
							<a href="index.php"> <img src="images/shop.png" alt="continue shopping" /></a>
						</div>
						<div class="shopright" style="float: right;">
							<a href="payment.php"> <img src="images/check.png" alt="checkout" /></a>
						</div>
					</div>
					    <div style="height: 60px; width:100%;bottom: 20px"></div>
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>