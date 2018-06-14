<?php include 'design/start.php'; ?>
<?php include 'design/header.php';?>
<?php
	$login = Session::get("login");
	if ($login==false) {
		header("Location:login.php");
	}
?>
<?php
	if (isset($_GET['order_id']) && $_GET['order_id'] == 'order') {
		
		$insertOrder = $ct->insertOrder($id);
		$delcart = $ct->delcart();
		header("Location:success.php");
	}
?>
<style type="text/css">
	.division{width: 50%;float: left;}
	.table{width: 500px;margin: 0 auto;border: 2px solid #ddd;}
	.table tr td{text-align: justify;}
	.tbltwo{float:right;text-align:left; width: 50%;margin-right: 14px;margin-top: 12px;}
	.tbltwo tr td{text-align: justify;padding: 5px 10px;border:1px solid #ddd;}
	.ordernow{}
	.ordernow a{width:200px;margin: 20px auto 0;text-align: center;padding: 5px;font-size: 30px;display: block;background: #ff0000;color: white;border-radius: 5px;text-decoration: none;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="division">
    		<table class="table">
							<tr>
								<th>SL</th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
							<?php
								$getpro = $ct->getCartPro();
								if ($getpro) {
									$i=0;
									$sum = 0;
									$qty = 0;
									while ($result= $getpro->fetch_assoc()) {
									$i++;
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['product_name']?></td>
								<td><?php echo $result['price']?></td>
								<td><?php echo $result['quantity']?></td>
								<td>
									<?php echo $total = $result['price']*$result['quantity']?>
								</td>
							</tr>
							<?php 
									$qty = $qty + $result['quantity'];
									$sum = $sum + $total;
							 ?>
							<?php
								} }
							?>
							
						</table>
						
						<table class="table">
							<tr>
								<td>Sub Total</td>
								<td><?php echo $sum; ?></td>
							</tr>
							<tr>
								<td>VAT</td>
								<td>15%</td>
							</tr>
							<tr>
								<td>Grand Total :</td>
								<td><?php
									$vat = $sum * 0.15;
									$gtotal = $sum + $vat;
									echo $gtotal;
								?></td>
							</tr>
							<tr>
								<td>Quantity</td>
								<td><?php echo $qty; ?></td>
							</tr>
					   </table>
    	</div>
    	<div class="division">
    		<?php
    		$id = Session::get("id");
    		$getdata = $cmr->customerData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    	?>
			<table class="table">
				<tr>
					<td colspan="3">Your Profile</td>
					
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $result['name']?></td>
				</tr>
				
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email']?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $result['address']?></td>
				</tr>
				<tr>
				<tr>
					<td></td>
					<td></td>
					<td style=""><a href="editprofile.php">Update Details</a></td>
				</tr>
				
			</table>
			<?php } }?>
    	</div>
    	<div class="ordernow">
 		<a style="float: left;" href="?order_id=order">Ordernow</a>
		<a style="float: right;" href="mbank.php">Pay Online</a>
 		</div>
 		</div>
 		
 		
 	</div>
 </div>
<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>