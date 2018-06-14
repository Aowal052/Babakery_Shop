<?php include '../classes/AdminLogin.php';?>


 <?php Session::checkLogin();?>

<?php
	$al = new AdminLogin;
	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		$adminUser = $_POST['adminUser'];
		$adminPass = $_POST['adminPass'];

		$loginChk = $al->AdminLogin($adminUser,$adminPass);
	}

?>
<?php 
	 if (!isset($_GET['id'])) {
	 	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	 	//header ("Location: cart.php?id=live");
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<span style="color: red;"><?php 
				if (isset($loginChk)) {
					echo $loginChk;
				}
			 ?></span>
			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">FEEDBACK</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>