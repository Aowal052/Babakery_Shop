<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/addcategory.php';?>

<?php
	$addcat = new addcategory;

	if (isset($_GET['delcat'])) {
		$id = $_GET['delcat'];
		$delcat = $addcat->delcatbyid($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <span style="color: green;"><?php 
                if (isset($delcat)) {
                    echo $delcat;
                }
             ?></span>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$getAllCat = $addcat->getAllCat();
						if ($getAllCat) {
							$i=1;
							while ($result= $getAllCat->fetch_assoc()) {
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['cat_id'];?>">Edit</a> || <a onclick="return confirm('are you sure')" href="?delcat=<?php echo $result['cat_id'];?>">Delete</a></td>
						</tr>
					<?php } }?>
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

