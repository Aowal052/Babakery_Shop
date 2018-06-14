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
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
	    $login = $cmr->login($_POST);
	}
?>

<div class="content">
	<div class="container">
		<div class="login-page">
			   <div class="account_grid">
				   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
					  	 <h3>NEW CUSTOMERS</h3>
						 <p style="color: #999;">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
						 <a class="acount-btn" href="register.php">Create an Account</a>
				   </div> 
				   <div class="col-md-6 login-right wow fadeInRight jumbotron" style="background: #ff8db2;" data-wow-delay="0.4s">
					  	<h3>REGISTERED CUSTOMERS</h3>
					  	<?php 
					  		if ($login) {
					  			echo $login;
					  		}
					  	?>
						<p>If you have an account with us, please log in.</p>
						<form action="" method="post">
						  <div>
							<span>Email Address<label>*</label></span>
							<input type="text" name="email" placeholder="Email"> 
						  </div>
						  <div>
							<span>Password<label>*</label></span>
							<input type="text" name="pass" placeholder="Password"> 
						  </div>
						  <a class="forgot" href="#">Forgot Your Password?</a>
						  <input type="submit" name="login" value="Login">
					    </form>
				   </div>	
				   <div class="clearfix"> </div>
			 </div>
		</div>
	</div>
</div>

 
<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>