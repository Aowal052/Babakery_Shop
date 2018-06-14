<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/flavour.php';?>

<?php
	$flavour = new flavour;

	if (isset($_GET['flavour_id'])) {
		$id = $_GET['flavour_id'];
		$delflavour = $flavour->delflavourbyid($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Flavour List</h2>
                <span style="color: green;"><?php 
                if (isset($delflavour)) {
                    echo $delflavour;
                }
             ?></span>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Flavour Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$getAllflavour = $flavour->getAllflavour();
						if ($getAllflavour) {
							$i=1;
							while ($result= $getAllflavour->fetch_assoc()) {
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $result['flavour_name'];?></td>
							<td><a href="flavouredit.php?flavour_id=<?php echo $result['flavour_id'];?>">Edit</a> || <a onclick="return confirm('are you sure')" href="?flavour_id=<?php echo $result['flavour_id'];?>">Delete</a></td>
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

