<?php include 'design/start.php' ?>
<?php include 'design/header.php' ?>

<?php
	$login = Session::get("login");
	if ($login==true) {
		header("Location:checkout.php");
	}
?>

<?php
	$cmr = new customers;
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
	    $register = $cmr->register($_POST);
	}
?>

	<!--start-content-->
	<div class="content">
		<div class="main">
		   <div class="container">
				<div class="register jumbotron" style="background-color: #fff;">
					  	<form action="" method="post"> 
							<div class="register-top-grid">
							<?php
					    			if (isset($register)) {
					    				echo $register;
					    			}
					    		?>
								<h3>PERSONAL INFORMATION</h3>
								
								 <div class="wow fadeInLeft" data-wow-delay="0.4s">
									<span>Full Name<label>*</label></span>
									<input type="text" name="name" placeholder="Name" class=""> 
								 </div>
								 <div class="wow fadeInRight" data-wow-delay="0.4s">
									 <span>Address<label>*</label></span>
									 <input type="text" name= "address" placeholder="Address" class=""> 
								 </div>
								 <div class="clearfix"> </div>
								   <a class="news-letter" href="#">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>I Agree To The Terms & Conditions</label>
								   </a>
							 </div>
							<div class="register-bottom-grid">
								<h3>LOGIN INFORMATION</h3>
								 <div class="wow fadeInLeft" data-wow-delay="0.4s">
									<span>Email<label>*</label></span>
									<input type="text" name="email" placeholder="Email" class="">
								 </div>
								 <div class="wow fadeInRight" data-wow-delay="0.4s">
									<span>Password<label>*</label></span>
									<input type="text" name="pass" placeholder="Password" class="">
								 </div>
							</div>
							<div class="register-but">
					   <form action="" method="post">
						   <input type="submit" name="register">
						   <div class="clearfix"> </div>
					   </form>
					</div>
						</form>
					<div class="clearfix"> </div>
					
				</div>
		     </div>
	    </div>
	</div>




<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>

