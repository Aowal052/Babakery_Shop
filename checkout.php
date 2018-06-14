<?php include 'design/start.php' ?>
<?php include 'design/header.php' ?>

<?php
	$login = Session::get("login");
	if ($login==false) {
		header("Location:login.php");
	}
?>
<?php
	

	if (isset($_GET['order_id'])) {
		$id = $_GET['order_id'];
		$delOdr = $ct->delOdrbyid($id);
	}
?>



 <div class="main">
    <div class="content">
    	<div class="section group">
			<table class="table">
							<tr width="100%">
								<th>SL</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Date</th>

								<th>status</th>
								<th>Action</th>
							</tr>
							<?php
								$custid = session_id();
								$getOdr = $ct->getOdr($custid); 
								if ($getOdr) {
									$i 	 = 0;
									$sum = 0;
									$qty = 0;
									while ($result=$getOdr->fetch_assoc()) {
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['product_name'];?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="img" style="height: 60px;width: 60px;"/></td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php echo $total = $result['price']*$result['quantity']; ?></td>
								<td><?php echo $fm->formatDate($result['date']);?></td>
								<td><?php 
									if ($result['status'] == 0) {
										echo "panding";
									}else{
										echo "shifted";
									}
								?></td>
								<?php 
									if (!isset($result['status'])) { ?>
								<td><a onclick="return confirm('are you sure')" href="?order_id=<?php echo $result['order_id'];?>">X</a></td>
								<?php }else{ ?>
									<td>N/A</td>
								<?php	}?>
							</tr>
							
							<?php } } ?>
						</table>
						
 		</div>
 	</div>
 </div>

<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>