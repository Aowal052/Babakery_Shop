<?php include 'design/start.php'; ?>
<?php include 'design/header.php';?>
<?php
	$login = Session::get("login");
	if ($login==false) {
		header("Location:login.php");
	}
?>

<style type="text/css">
	form{
		width: 50%;
		margin: 0 auto;
	}
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
		<div class="cartpage">
			 <h3 style="text-align: center;">User Profile</h3>
			 <?php
    		$id = Session::get("id");
    		$getdata = $cmr->customerData($id);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    	?>
		    <table class="table" style="width: 50%;margin: 0 auto;">
		    	<tr>
					<th colspan="3" style="text-align: center">Your Profile</th>
					
				</tr>
		    	<tr>
		    		<th width="20%">name</th>
			    	<td width="5%">:</td>
			    	<td><?php echo $result['name'];?></td>
		    	</tr>
		    	<tr>
		    		<th>address</th>
			    	<td>:</td>
			    	<td><?php echo $result['address'];?></td>
		    	</tr>
		    	<tr>
		    		<th>email</th>
			    	<td>:</td>
			    	<td><?php echo $result['email'];?></td>
		    	</tr>
		    	<tr>
					<td></td>
					<td></td>
					<td style=""><a href="editprofile.php">Update Details</a></td>
				</tr>
		    </table>	
			<?php } } ?>	
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>