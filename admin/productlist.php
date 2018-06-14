<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php  include '../classes/product.php';?>
<?php  include_once '../helpers/Format.php';?>

<?php
	$product = new product;
	$fm 	 = new Format;

	if (isset($_GET['product_id'])) {
		$id = $_GET['product_id'];
		$delproduct = $product->delproductid($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <span style="color: green;"><?php 
                if (isset($delproduct)) {
                    echo $delproduct;
                }
             ?></span>
        <div class="block">  
            <table class="data display datatable" id="example">
				<thead style="width: 100%">
					<tr>
						<th width="10%">SL</th>
						<th width="10%">Post Title</th>
						<th width="15%">Description</th>
						<th width="10%">Category</th>
						<th width="10%">Flavour</th>
						<th width="10%">Price</th>
						<th width="10%">Image</th>
						<th width="10%">type</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				
			<?php
						$getAllproduct = $product->getAllproducts();
						if ($getAllproduct) {
							$i=1;
							while ($result= $getAllproduct->fetch_assoc()) {
			?>

				<tr class="odd gradeX">
					<td><?php  echo $i;?></td>
					<td><?php  echo $fm->textShorten($result['product_name'],20);?></td>
					<td><?php  echo $fm->textShorten($result['body'],50);?></td>
					<td><?php  echo $result['cat_name'];?></td>
					<td><?php  echo $result['flavour_name'];?></td>
					<td>$<?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
					<td><?php
						 	if ($result['type']==2) {
						 		echo "Genarel";
						 	}elseif ($result['type']==1) {
						 		echo "Featured";
						 	}else{
						 		echo "select type";
						 	}

					 	?>	 	
					 </td>
					
					<td><a href="productedit.php?product_id=<?php echo $result['product_id'];?>">Edit</a> || <a onclick="return confirm('are you sure')" href="?product_id=<?php echo $result['product_id'];?>">Delete</a></td>
				</tr>
			<?php
								$i++;
							}
						}
					
			?>
			
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
