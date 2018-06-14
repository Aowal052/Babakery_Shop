<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/cart.php';?>
<?php include '../classes/customers.php';?>
<?php
	$ct = new cart();
	if (isset($_GET['shiftid'])) {
		$id = $_GET['shiftid'];

		$shift = $ct->productShifted($id);
	}
	if (isset($_GET['delpro'])) {
		$id = $_GET['delpro'];

		$delpro = $ct->delOdr($id);
	}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                	if (isset($shift)) {
                		echo $shift;
                	}
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
					
						<tr>
							<th>ID.</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>price</th>
							<th>Customer</th>
							<th>address</th>
							
							<th>phpne</th>
							<th>Transection Id</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						
						$getOdr = $ct->getAllOrderProduct();
						if ($getOdr) {
							while ($result = $getOdr->fetch_assoc()) {
					?>
						<tr class="odd gradeX">
							<td><?php echo $result['product_id']; ?></td>
							<td><?php echo $result['date']; ?></td>
							<td><?php echo $result['product_name']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<?php
								$cmr = new customers;
					    		$id = Session::get("id");
					    		$getdata = $cmr->customerData($id);
					    		if ($getdata) {
					    			while ($value = $getdata->fetch_assoc()) {
					    	?>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['address']; ?></td>
							<?php
								if ($result['transid']!='0') {
								
							?>
							<td><?php echo $result['phone']; ?></td>
							<td><?php echo $result['transid']; ?></td>
							<?php } ?>
							<?php } } ?>
							<?php
								if ($result['status']==0) { ?>
									<td><a href="?shiftid=<?php echo $result['product_id']; ?> & price=<?php echo $result['price']; ?> & date=<?php echo $result['date']; ?>">Shift</a></td>
								
							<?php	}else {?>
							<td><a href="?delpro=<?php echo $result['product_id']; ?> & price=<?php echo $result['price']; ?> & date=<?php echo $result['date']; ?>">Removed</a></td>

							<?php } ?>
						</tr>

					<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
