<?php include '/../lib/Session.php';?>
<?php Session::init();?>
<?php
	include_once('lib/Database.php');
	include_once('helpers/Format.php');
	
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	$db  = new Database;
	$fm  = new Format;
	$ct  = new cart;
	$pd  = new product;
	$cat = new addcategory;
	$cmr = new customers();
	$flavour = new flavour()
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

	
		<!-- top-header -->
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul>
						<li><a href="cart.php" data-toggle="tooltip" data-placement="bottom" title="CART"><i class="fa fa-shopping-cart"></i> 
							<?php 
									$getdata = $ct->checkCartTable();
									if ($getdata) {
										$sum = Session::get("sum");
										$qty = Session::get("qty");
										echo "$".$sum;
										echo ";Qty =".$qty;
									}else{
										echo "(empty)";
									}
									
							 ?>
						</a></li>
						<div class="clearfix"> </div>
					</ul>
				</div>
				<div class="top-header-center">
					
					<form action="search.php" method="get">
						<input type="text" name="src">
						<input type="submit" value="" />
					</form>
					
				</div>
				<div class="top-header-right">
				<?php
				if (isset($_GET['custid'])) {
					$delcart = $ct->delcart();
					Session::destroy();
				}
			?>
					<ul>
						<?php
							$login = Session::get("login");
							if ($login==false) { ?>

								<li><a href="register.php" data-toggle="tooltip" data-placement="bottom" title="REGISTER">Register</a></li>
								<li><a href="login.php" style="border-right:1px solid #FFF;" data-toggle="tooltip" data-placement="bottom" title="LOGIN">Login</a></li>

						<?php  }else{ ?>

						<li><a href="?custid=<?php Session::get('id'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout">Logout</a></li>

							<?php 
							  	$login = Session::get("login");
							  	if ($login==true) { ?>
									<li><a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="User Profile"><i class="glyphicon glyphicon-user"></i></a></li>
							<?php } ?>
							<?php 
							  	$custid = Session::get("id");
							  	$chkOdr = $ct->chkOdr($custid);
							  	if ($chkOdr==true) { ?>
									<li><a href="checkout.php" data-toggle="tooltip" data-placement="bottom" title="order details"><i class="glyphicon glyphicon-briefcase"></i></a></li>
							<?php } ?>

						<?php } ?>
						
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- /top-header -->
		<!-- main-menu -->
		<div class="main-menu">
			<div class="container">

				<div class="head-nav">
					<span class="menu"> </span>
					<ul>
						<li><a href="index.php" data-toggle="tooltip" title="HOME"><i class="fa fa-home"></i></a></li>
						<li><a href="products.php" data-toggle="tooltip" title="PRODUCTS"><i class="fa fa-birthday-cake"></i></a></li>
						
						<li><a href="about.php" data-toggle="tooltip" title="ABOUT US"><i class="fa fa-address-book"></i></a></li>
						<li><a href="contact.php" data-toggle="tooltip" title="CONTACT US"><i class="fa fa-info-circle"></i></a></li>
						<div class="clearfix"> </div>
					</ul>
				</div>	
					

				<!-- logo -->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="Sweetcake" /></a>
				</div>
				<!-- logo -->

			</div>
		</div>
		<!-- /main-menu -->