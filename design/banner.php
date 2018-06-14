			<!-- banner -->
			<div class="container">
				<div class="img-slider">
						
					<!--start-slider-script-->
					<script src="js/responsiveslides.min.js"></script>
					 <script>
					    // You can also use "$(window).load(function() {"
					    $(function () {
					      // Slideshow 4
					      $("#slider4").responsiveSlides({
					        auto: true,
					        pager: true,
					        nav: true,
					        speed: 500,
					        namespace: "callbacks",
					        before: function () {
					          $('.events').append("<li>before event fired.</li>");
					        },
					        after: function () {
					          $('.events').append("<li>after event fired.</li>");
					        }
					      });
					
					    });
					  </script>
					<!--//End-slider-script-->
					<!-- Slideshow 4 -->
					    <div  id="top" class="callbacks_container">
					      <ul class="rslides" id="slider4">
					        <li>
					          <img  src="images/slide.jpg" class="img-responsive" style="height: 67vh;">
					          <div class="slider-caption">
					          	 <div class="slider-caption-left text-center">
					          	 	<h1>BANNER NO. ONE</h1>
					          	 	<p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
					          	 	<a class="buy-btn" href="#">Buy Now</a>
					          	 </div>
					          	  <div class="slider-caption-right">
					          	  	<a href="#"><img src="images/iteam.png" class="img-responsive" title="name" /></a>
					          	  </div>
					          	  <div class="clearfix"> </div>
					          </div>
					        </li>
					         <li>
					          <img  src="images/slide.jpg" class="img-responsive"  style="height: 67vh;">
					          <div class="slider-caption">
					          	 <div class="slider-caption-left text-center">
					          	 	<h1>BANNER NO. TWO</h1>
					          	 	<p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
					          	 	<a class="buy-btn" href="#">Buy Now</a>
					          	 </div>
					          	  <div class="slider-caption-right">
					          	  	<a href="#"><img src="images/iteam.png" class="img-responsive" title="name" /></a>
					          	  </div>
					          	  <div class="clearfix"> </div>
					          </div>
					          
					        </li>
					        <li>
					          <img src="images/slide.jpg" class="img-responsive"  style="height: 67vh;">
					           <div class="slider-caption">
					          	 <div class="slider-caption-left text-center">
					          	 	<h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
					          	 	<p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
					          	 	<a class="buy-btn" href="#">Buy Now</a>
					          	 </div>
					          	  <div class="slider-caption-right">
					          	  	<a href="#"><img src="images/iteam.png" class="img-responsive" title="name" /></a>
					          	  </div>
					          	  <div class="clearfix"> </div>
					          </div>
					           
					        </li>
					        <li>
					          <img src="images/slide.jpg" class="img-responsive"  style="height: 67vh;">
					           <div class="slider-caption">
					            <div class="slider-caption-left text-center">
					          	 	<h1>ARE YOU LOOKING FOR SWEET, STYLISH AND DELECIOUS BIRTHDAY CAKES?</h1>
					          	 	<p>DON'T WORRY, WE CAN HELP YOU! CHECK OUR BEST CAKE SECTION.</p>
					          	 	<a class="buy-btn" href="#">Buy Now</a>
					          	 </div>
					          	  <div class="slider-caption-right">
					          	  	<a href="#"><img src="images/iteam.png" class="img-responsive" title="name" /></a>
					          	  </div>
					          	  <div class="clearfix"> </div>
					          </div>
					           
					        </li>
					      </ul>
					    </div>
					    <div class="clearfix"> </div>
					</div>
		<!-- /banner -->
		</div>