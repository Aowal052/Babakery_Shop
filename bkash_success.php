<?php include 'design/start.php'; ?>
<?php include 'design/header.php';?>
<?php
	$login = Session::get("login");
	if ($login==false) {
		header("Location:login.php");
	}
?>
<style type="text/css">
	.payment{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin: 0 auto;}
	.payment h2{border-bottom:1px solid #ddd;margin-bottom: 40px;padding-bottom: 10px; }
	/*.payment {background: #ff0000 none repeat scroll 0 0 ;border-radius: 3px;color: #fff;font-size: 16px;padding: 5px 30px;}*/
	.back {width: 160px;margin: 5px auto 0;padding: 7px 0px;text-align: center;display: block;background: #555;border: 1px solid #333;color: #fff;border-radius: 3px;font-size: 16px;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
   			<div class="payment">
   				<h2>Payment Procedure</h2>
   				<p style="color: green;">your payment procedure is successfully done.</p>
   				<?php
   					$id = session_id();
   					$amount = $ct->payableAmount($id);
   					if (isset($amount)) {
   						$sum = 0;
   						while ($result = $amount->fetch_assoc()) {
						$price = $result['price'];
					    $sum = $sum + $price;
						}

					    echo 'your total Amount is Tk'.$sum. '<br>';
					}
   				?>
				<span>For Details <a href="bkash_checkout.php">cheack hare</a></span>
 		</div>
 		
 	</div>
 </div>
<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>