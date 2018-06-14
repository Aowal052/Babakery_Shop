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
	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
	    $feedback = $cmr->feedback($_POST);
	}
?>
	<div class="content">
		<div class="container">
			<h2>Contact</h2><hr>

			<div class="main-content">
					

				<div class="contact">
					<!-- <div class="contact_info">
			    	 	<h3>Find Us Here</h3>
			    	 		<div class="map">
					   			<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
					   		</div>
      				</div> -->
					<div class="section group">				
						<div class="col span_1_of_3">
							
			      			<div class="company_address">
							     	<h3>Bakery Information :</h3>
									    	<p>Varendra University,</p>
									   		<p>Talaimari, Rajshahi</p>
									   		<p>Bangladesh</p>
							   		<p>Phone:(880) 1711 111 111</p>
							 	 	<p>Email: <span>info@sweetcake.com</span></p>
							   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
							</div>
						</div>				
						<div class="col span_2_of_3">
						  <div class="contact-form">
						  	<h3>Contact Us</h3>
						  	<?php
					    			if (isset($feedback)) {
					    				echo $feedback;
					    			}
					    		?>
							    <form method="post" action="">
							    	<div>
								    	<span><label>NAME</label></span>
								    	<span><input name="userName" type="text" class="textbox"></span>
								    </div>
								    <div>
								    	<span><label>E-MAIL</label></span>
								    	<span><input name="userEmail" type="text" class="textbox"></span>
								    </div>
								    <div>
								     	<span><label>MOBILE</label></span>
								    	<span><input name="userPhone" type="text" class="textbox"></span>
								    </div>
								    <div>
								    	<span><label>SUBJECT</label></span>
								    	<span><textarea name="userMsg"> </textarea></span>
								    </div>
								   <div>
								   		<span><input type="submit" name="submit" value="Submit"></span>
								  </div>
							    </form>
							
						    </div>
		  				</div>				
				  	</div>
				</div>


			</div>
		</div>
	</div>



<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>